<?php
namespace Norkunas\MediaManager\Commands;

use File;
use Exception;

class GetContents extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            return self::success(File::get($params['file']->getPathname()));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}