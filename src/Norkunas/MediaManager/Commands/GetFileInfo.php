<?php
namespace Norkunas\MediaManager\Commands;

use File;
use finfo;

class GetFileInfo extends AbstractCommand implements CommandInterface {
    public function run($params) {
        if(!$params['file']->isFile()) {
            return self::success('', array(
                'exists' => false
            ));
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($params['file']->getPathname());

        $meta = array(
            'mime' => $mime,
            'type' => current(explode('/', $mime))
        );

        if(false !== strpos($mime, 'image') && ($image = getimagesize($params['file']->getPathname()))) {
            if(isset($image[0])) {
                $meta['width'] = $image[0];
            }

            if(isset($image[0])) {
                $meta['height'] = $image[1];
            }

            if(isset($image['bits'])) {
                $meta['bits'] = $image['bits'];
            }

            if(isset($image['channels'])) {
                $meta['channels'] = $image['channels'];
            }
        }

        return self::success('', array(
            'exists' => File::exists($params['file']->getPathname()),
            'perms' => substr(sprintf('%o', $params['file']->getPerms()), -4),
            'readable' => is_readable($params['file']->getPathname()),
            'writable' => File::isWritable($params['file']->getPathname()),
            'extension' => $params['file']->getExtension(),
            'atime' => $params['file']->getATime(),
            'ctime' => $params['file']->getCTime(),
            'mtime' => $params['file']->getMTime(),
            'meta' => $meta
        ));
    }
}