<?php

namespace RB\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MakeRBRequest extends Command
{
	/**
	* The name and signature of the console command.
	*
	* @var string
	*/
	protected $signature = 'make:rb_request {name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Make request class that extends from RB_Request.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function handle()
	{
		$requestName = $this->argument( 'name' );

		if( $this->createRequest($requestName) )
		{
			$this->info("Request {$requestName} created successfully!");
		}
		else
		{
			$this->error(
				"Couldn't create request $requestName. 
				Please check the write permissions and make sure that you don't have $requestName.php file existing already."
			);
		}
	}

	/**
	 * @param string $requestName
	 * @return bool
	 */
	protected function createRequest( string $requestName ): bool
	{
		$data = compact( 'requestName' );

		$dir = Config::get( 'response_builder.request_path' );

		if( !$dir )
		{
			exit( 'Invalid path for request file. Please check configuration and make sure that you have "request_path" set correctly.' );
		}

		$this->createDirIfNotExist( $dir );

		$this->laravel->view->addNamespace( 'blade_generators', __DIR__.'/../blade_generators' );

		$output = $this->laravel->view->make( 'blade_generators::rb_request' )->with( $data )->render();

		$file = $dir . $requestName. '.php';

		if (
			!file_exists( $file ) &&
			$handle = fopen( $file, 'x' )
		)
		{
			fwrite( $handle, $output );
			fclose( $handle );

			return true;
		}

		return false;
	}

	/**
	 * @param string $dir
	 */
	protected function createDirIfNotExist( string $dir ): void
	{
		$dirArr = explode(  '/', $dir );

		foreach ( $dirArr as $dir )
		{
			if( !is_dir( $dir ) )
			{
				mkdir( $dir );
			}
		}
	}
}