<?php
namespace Norkunas\MediaManager\Commands;

use Config;
use Exception;

class UploadFile extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            if(Config::get('media-manager::thumbs.enabled')) {
                // generate thumb
            }

            $params['file']->move($params['uploads_path'] . '/' . $params['path'], $params['file']->getClientOriginalName());

            return self::success();
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}