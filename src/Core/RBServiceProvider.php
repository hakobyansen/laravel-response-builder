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
			__DIR__.'/../Config/config.php' => app()->basePath() . '/config/response_builder.php',
		]);

		// Register commands
		$this->commands([
			MakeRBRequest::class
		]);
	}
}
