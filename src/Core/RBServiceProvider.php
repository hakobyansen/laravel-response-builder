<?php

namespace RB\Core;

use Illuminate\Support\ServiceProvider;
use RB\Commands\MakeRBRequest;

class RBServiceProvider extends ServiceProvider
{
	public function boot()
	{
		// Publish configuration and RB_Request files
		$this->publishes([
			__DIR__.'/../Configs/config.php' => app()->basePath() . '/config/response_builder.php',
			__DIR__ . '/../Requests/RBRequest.php' => app()->basePath() . '/app/Http/Requests/RBRequest.php',
		], 'laravel-response-builder');

		// Register commands
		$this->commands([
			MakeRBRequest::class
		]);
	}

	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../Configs/config.php', 'response_builder');
	}
}
