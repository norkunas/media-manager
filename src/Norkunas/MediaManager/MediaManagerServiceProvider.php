<?php
namespace Norkunas\MediaManager;

use Illuminate\Support\ServiceProvider;

class MediaManagerServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->package('norkunas/media-manager');

        include __DIR__ . '/../../routes.php';
	}
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
        $this->app['mediamanager'] = $this->app->share(function($app) {
            return new MediaManager();
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('MediaManager', 'Norkunas\MediaManager\Facades\MediaManager');
        });
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}
}