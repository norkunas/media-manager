<?php
namespace Norkunas\MediaManager\Commands;

use URL;
use finfo;
use Exception;
use SplFileInfo;
use FilesystemIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class GetFiles extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            $dirsStack = array();
            $filesStack = array();

            $sizeSort = function(SplFileInfo $a, SplFileInfo $b) {
                $getDirectorySize = function($path) {
                    $bytes = 0;

                    if(strtolower(substr(PHP_OS, 0, 3)) !== 'win') {
                        $io = popen('/usr/bin/du -sb ' . $path, 'r');
                        if($io !== false) {
                            $bytes = intval(fgets($io, 80));
                            pclose($io);
                            return $bytes;
                        }
                    } else {
                        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $directory) {
                            $bytes += $directory->getSize();
                        }
                    }

                    return $bytes;
                };

                $s1 = ($a->isDir() ? $getDirectorySize($a->getPathname()) : $a->getSize());
                $s2 = ($b->isDir() ? $getDirectorySize($b->getPathname()) : $b->getSize());

                if(function_exists('gmp_cmp')) {
                    return gmp_cmp($s1, $s2);
                } else {
                    if($s1 > $s2) {
                        return 1;
                    } else if($s2 < $s2) {
                        return -1;
                    } else {
                        return 0;
                    }
                }
            };

            $finfo = new finfo(FILEINFO_MIME_TYPE);

            $directories = Finder::create()->depth(0)->directories()->in($params['uploads_path'] . '/' . $params['path']);

            if(isset($params['sort'])) {
                switch($params['sort']) {
                    case 'type':
                        $directories->sortByType();
                        break;
                    case 'size':
                        $directories->sort($sizeSort);
                        break;
                    case 'date':
                        $directories->sortByModifiedTime();
                        break;
                    default:
                        $directories->sortByName();
                }
            }

            if(isset($params['search'])) {
                $directories->name('*' . $params['search'] . '*');
            }

            foreach(iterator_to_array($directories) as $file) {
                $mime = $finfo->file($file);

                $data = array(
                    'name' => $file->getBasename(),
                    'type' => current(explode('/', $mime)),
                    'mime' => $mime,
                    'path' => ltrim(str_replace(array($params['uploads_path'], '\\'), array('', '/'), $file->getPathname()), '\/'),
                    'extension' => ''
                );

                $dirsStack[] = $data;
            }

            if(isset($params['order'])) {
                $dirsStack = array_reverse($dirsStack);
            }

            $files = Finder::create()->depth(0)->files()->in($params['uploads_path'] . '/' . $params['path']);

            if(isset($params['sort'])) {
                switch($params['sort']) {
                    case 'type':
                        $files->sortByType();
                        break;
                    case 'size':
                        $files->sort($sizeSort);
                        break;
                    case 'date':
                        $files->sortByModifiedTime();
                        break;
                    default:
                        $files->sortByName();
                }
            }

            if(isset($params['search'])) {
                $files->name('*' . $params['search'] . '*');
            }

            foreach(iterator_to_array($files) as $file) {
                $mime = $finfo->file($file);

                $data = array(
                    'name' => $file->getBasename(),
                    'type' => current(explode('/', $mime)),
                    'mime' => $mime,
                    'path' => $params['path'],
                    'extension' => $file->getExtension(),
                    'url' => URL::to(ltrim(str_replace(str_replace('\\', '/', public_path()), '', str_replace('\\', '/', $file->getPath())), '\/') . '/' . $file->getBasename())
                );

                $filesStack[] = $data;
            }

            if(isset($params['order'])) {
                $filesStack = array_reverse($filesStack);
            }

            $stack = array_merge($dirsStack, $filesStack);

            if(isset($params['filter'])) {
                $stack = array_values(array_where($stack, function($key, $value) use ($params) {
                    if($params['filter'] === 'file') {
                        return ($value['type'] !== 'directory');
                    } else {
                        return ($value['type'] === $params['filter']);
                    }
                }));
            }

            return self::success('', array(
                'breadcrumb' => array_filter(explode('/', $params['path'])),
                'files' => $stack
            ));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}