<?php

namespace RB\Core;

use Illuminate\Support\ServiceProvider;
use RB\Commands\MakeRBRequest;

class RBServiceProvider extends ServiceProvider
{
	public function boot()
	{
		// Publish configuration files
		$this->publishes([
			__DIR__.'/../Configs/config.php' => app()->basePath() . '/config/response_builder.php',
		], 'response-builder');

		// Register commands
		$this->commands([
			MakeRBRequest::class
		]);
	}

	public function register()
	{
		$this->app->bind(
			'\RB\Core\Contracts\IResponse',
			'\RB\Core\Response'
		);
	}
}
