<?php
namespace Norkunas\MediaManager;

use App;
use File;
use Input;
use Config;
use Response;
use SplFileInfo;
/**
 * mov format shoud have video/quicktime mime type
 */

class MediaManager {
    protected static $filters = array('directory', 'file', 'image', 'video', 'audio');
    protected static $sort = array('title', 'type', 'size', 'date');
    protected static $order = array('asc', 'desc');

    protected $supportedLocales;

    protected $uploadsPath;

    protected $thumbsPath;
    protected $thumbWidth;
    protected $thumbHeight;

    public function __construct() {
        $this->supportedLocales = $this->getSupportedLocales();
        $this->uploadsPath = rtrim(str_replace('\\', '/', Config::get('media-manager::path.uploads')), '/');
        $this->thumbsPath = rtrim(str_replace('\\', '/', Config::get('media-manager::path.thumbs')), '/');
        $this->thumbWidth = Config::get('media-manager::thumbs.width');
        $this->thumbHeight = Config::get('media-manager::thumbs.height');
    }

    public function init() {
        App::setLocale(self::supportsLocale(Input::get('locale')) ? Input::get('locale') : Config::get('media-manager::locale'));

        $path = trim(Input::get('path'));

        if(!empty($path)) {
            $path = trim($this->canonicalizePath($path), '/');
        }

        $file = trim(Input::get('file'));

        if(!empty($file)) {
            $file = new SplFileInfo($this->uploadsPath . '/' . (!empty($path) ? $path . '/' : '') . trim($this->canonicalizePath($file), '/'));
        } else if(trim(Input::file('file')) !== '') {
            $file = Input::file('file');
        }

        $target = trim(Input::get('target'));

        if(!empty($target)) {
            $target = new SplFileInfo($this->uploadsPath . '/' . (!empty($path) ? $path . '/' : '') . trim($this->canonicalizePath($target), '/'));
        }

        $filter = trim(Input::get('filter'));
        if(!in_array($filter, self::$filters)) {
            $filter = null;
        }

        $sort = trim(Input::get('sort'));
        if(!in_array($sort, self::$sort)) {
            $sort = null;
        }

        $order = trim(Input::get('order'));
        if(strcasecmp($order, 'desc') !== 0) {
            $order = null;
        }

        $search = trim(Input::get('search'));
        if(empty($search)) {
            $search = null;
        }

        $cmd = __NAMESPACE__ . '\\Commands\\' . Input::get('cmd');

        if(class_exists($cmd) && in_array('Norkunas\MediaManager\Commands\CommandInterface', class_implements($cmd))) {
            return Response::json(with(new $cmd())->run(array(
                'assets' => $this->asset(),
                'uploads_path' => $this->uploadsPath,
                'path' => $path,
                'file' => $file,
                'target' => $target,
                'filter' => $filter,
                'sort' => $sort,
                'order' => $order,
                'search' => $search
            )));
        }

        return App::abort(404);
    }

    public function supportsLocale($locale) {
        return (in_array(strtolower($locale), $this->supportedLocales));
    }

    public function js() {
        return $this->asset('js/mediamanager.js');
    }

    public function asset($path='') {
        return asset('packages/norkunas/media-manager' . (!empty($path) ? '/' . ltrim($path, '/') : ''));
    }

    protected function getSupportedLocales() {
        return array_build(File::directories(__DIR__ . '/../../lang'), function($k, $d) {
            return array($k, basename($d));
        });
    }

    protected function canonicalizePath($path) {
        $path = explode('/', str_replace('\\', '/', $path));
        $stack = array();

        foreach($path as $seg) {
            if($seg === '..') {
                array_pop($stack);
                continue;
            }

            if($seg === '.') {
                continue;
            }

            $stack[] = $seg;
        }

        return implode('/', $stack);
    }
}