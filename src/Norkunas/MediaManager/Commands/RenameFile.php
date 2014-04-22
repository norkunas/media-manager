<?php
namespace Norkunas\MediaManager\Commands;

use Lang;
use Exception;
use Symfony\Component\Filesystem\Filesystem;

class RenameFile extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            if($params['file']->getPathname() == $params['target']->getPathname()) {
                return self::success();
            }

            $fs = new Filesystem();
            $fs->rename($params['file']->getPathname(), $params['target']->getPathname());

            return self::success(Lang::get('media-manager::message.rename.success_' . ($params['file']->isDir() ? 'folder' : 'file'), array(
                'old' => $params['file']->getBasename(),
                'new' => $params['target']->getBasename()
            )));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}