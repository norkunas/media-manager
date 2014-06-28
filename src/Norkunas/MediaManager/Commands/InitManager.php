<?php
namespace Norkunas\MediaManager\Commands;

use View;
use Input;
use Exception;

class InitManager extends AbstractCommand implements CommandInterface {
    public function run($params) {
        try {
            return self::success('', array(
                'templates' => array(
                    'explorer' => View::make('media-manager::explorer')->with('insert', filter_var(Input::get('insert'), FILTER_VALIDATE_BOOLEAN))->render(),
                    'files' => View::make('media-manager::files')->render(),
                    'alert' => View::make('media-manager::alert')->render(),
                    'confirm' => View::make('media-manager::confirm')->render(),
                    'upload' => View::make('media-manager::upload')->render(),
                    'rename' => View::make('media-manager::rename')->render(),
                    'create_folder' => View::make('media-manager::create_folder')->render(),
                    'edit_text' => View::make('media-manager::edit_text')->render()
                ),
                'assets' => $params['assets'],
                'path' => ''
            ));
        } catch(Exception $e) {
            return self::error($e->getMessage());
        }
    }
}
