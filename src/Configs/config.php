<?php

return [

	/**
	 * Generated request classes will be store in specified "request_path" directory.
	 */

	'request_path' => base_path( 'app/Http/Requests' ),

	/**
	 * Namespace for generated request class.
	 */

	'request_namespace' => 'App\Http\Requests',

	/**
	 * Default value of Request's authorize() method.
	 */

	'is_authorize' => "true",

	/**
	 * Default messages
	 */

	'messages' => [
		'failed_validation' => 'The given data was invalid.',
	]

];
