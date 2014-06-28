<?php
namespace Norkunas\MediaManager\Commands;

use File;
use Lang;
use Exception;

class DeleteFile extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            $method = 'delete' . ($params['file']->isDir() ? 'Directory' : '');

            File::$method($params['file']->getPathname());

            return self::success(Lang::get('media-manager::message.delete.success_' . ($params['file']->isDir() ? 'folder' : 'file')));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}
