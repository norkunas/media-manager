<?php
namespace Norkunas\MediaManager\Commands;

use Exception;

class UploadFile extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            $filename = str_replace(' ', '_', trim($params['file']->getClientOriginalName()));

            $params['file']->move($params['uploads_path'] . '/' . $params['path'], $filename);

            return self::success();
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}
