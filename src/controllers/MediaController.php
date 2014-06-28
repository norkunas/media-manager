<?php
namespace Norkunas\MediaManager;

class MediaController extends \Illuminate\Routing\Controller {
    public function postInit() {
        return \MediaManager::init();
    }
}
