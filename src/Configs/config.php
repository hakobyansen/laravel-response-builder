<?php

return [

	/**
	 * Generated request classes will be stored in specified "request_path" directory.
	 * Must be wrapped in base_path() helper.
	 */

	'request_path' => base_path( 'app/Http/Requests/ResponseBuilder' ),

	/**
	 * Namespace for generated request class.
	 */

	'request_namespace' => 'App\Http\Requests\ResponseBuilder',

	/**
	 * Default value of Request's authorize() method.
	 */

	'is_authorize' => "true",

	/**
	 * Default messages.
	 */

	'messages' => [
		'failed_validation' => 'The given data was invalid.',
	]

];
