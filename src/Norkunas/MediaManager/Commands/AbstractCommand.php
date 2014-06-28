<?php
namespace Norkunas\MediaManager\Commands;

abstract class AbstractCommand {
    public static function success($message='', array $data=array()) {
        return array(
            'status' => 1,
            'message' => $message
        ) + $data;
    }

    public static function error($message='', array $data=array()) {
        return array(
            'status' => 0,
            'message' => $message
        ) + $data;
    }
}
