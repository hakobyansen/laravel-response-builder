<?php

namespace Rb\Facade;

use Illuminate\Http\JsonResponse;
use Rb\Core\HttpStatusCode;
use Rb\Core\Response as CoreResponse;

class Response
{
	/**
	 * @param array|object|null $data
	 * @param string $message
	 * @param int $statusCode
	 * @return JsonResponse
	 */
	public static function success(array|object|null $data = null, string $message = '', int $statusCode = HttpStatusCode::OK): JsonResponse
	{
		$Response = new CoreResponse();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data);

		return $Response->getResponse();
	}

	/**
	 * @param array $data
	 * @param array $errors
	 * @param string $message
	 * @param int $statusCode
	 * @return JsonResponse
	 */
	public static function error(
		array|object|null $data = null,
		array $errors = [],
		string $message = 'Something went wrong...',
		int $statusCode = HttpStatusCode::INTERNAL_SERVER_ERROR): JsonResponse
	{
		$Response = new CoreResponse();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data)
			->setErrors($errors);

		return $Response->getResponse();
	}
}
