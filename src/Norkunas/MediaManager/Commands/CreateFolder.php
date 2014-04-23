<?php
namespace Norkunas\MediaManager\Commands;

use File;
use Lang;
use Exception;

class CreateFolder extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            File::makeDirectory($params['uploads_path'] . '/' . (!empty($params['path']) ? $params['path'] . '/' : '') . $params['file']->getBasename());

            return self::success(Lang::get('media-manager::message.create.success_folder', array(
                'title' => $params['file']->getBasename()
            )));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}