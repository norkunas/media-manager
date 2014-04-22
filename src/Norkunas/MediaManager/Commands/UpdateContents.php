<?php
namespace Norkunas\MediaManager\Commands;

use Lang;
use Input;
use Exception;
use Symfony\Component\Filesystem\Filesystem;

class UpdateContents extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            $fs = new Filesystem();
            $fs->dumpFile($params['file']->getPathname(), Input::get('content'));

            return self::success(Lang::get('media-manager::message.update.success_text', array('title' => $params['file']->getBasename())));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}