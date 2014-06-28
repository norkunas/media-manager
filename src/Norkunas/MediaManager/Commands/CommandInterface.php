<?php
namespace Norkunas\MediaManager\Commands;

interface CommandInterface {
    public function run($params);
    public static function success($message='', array $data=array());
    public static function error($message='', array $data=array());
}
