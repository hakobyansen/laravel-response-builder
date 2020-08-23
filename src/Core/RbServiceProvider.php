<?php

namespace Rb\Core;

use Illuminate\Support\ServiceProvider;
use Rb\Commands\MakeRbRequest;

class RbServiceProvider extends ServiceProvider
{
	public function boot()
	{
		// Publish configuration and RbRequest files
		$this->publishes([
			__DIR__.'/../Configs/config.php' => app()->basePath() . '/config/response_builder.php',
			__DIR__ . '/../Requests/RbRequest.php' => app()->basePath() . '/app/Http/Requests/RB/RbRequest.php',
		], 'laravel-response-builder');

		// Register commands
		$this->commands([
			MakeRbRequest::class
		]);
	}

	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../Configs/config.php', 'response_builder');
	}
}
