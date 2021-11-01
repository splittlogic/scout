<?php

namespace splittlogic\scout;

use Illuminate\Support\ServiceProvider;

class scoutServiceProvider extends ServiceProvider
{


	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'scout');
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');

		if ($this->app->runningInConsole()) {
			$this->bootForConsole();
		}
	}


	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/scout.php', 'scout');

		$this->app->singleton('scout', function ($app) {
			return new scout;
		});
	}


	public function provides()
	{
		return ['scout'];
	}


	protected function bootForConsole()
	{
		// Publishing the configuration file.
		$this->publishes([
			__DIR__.'/../config/scout.php' => config_path('scout.php'),
		], 'scout.config');

		// Publishing the views.
    $this->publishes([
        __DIR__.'/../resources/views' => base_path('resources/views/vendor/splittlogic'),
    ], 'scout.views');

    // Publishing assets.
    $this->publishes([
        __DIR__.'/../resources/assets' => public_path('vendor/splittlogic'),
    ], 'public');

	}


}
