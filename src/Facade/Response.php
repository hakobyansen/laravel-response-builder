<?php

namespace Rb\Facade;

use Illuminate\Http\JsonResponse;
use Rb\Core\HttpStatusCode;

class Response
{
	/**
	 * @param  array  $data
	 * @param  string  $message
	 * @param  int  $statusCode
	 * @return JsonResponse
	 */
	public static function success(array $data = [], string $message = '', int $statusCode = HttpStatusCode::OK): JsonResponse
	{
		$Response = new \Rb\Core\Response();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data);

		return $Response->getResponse();
	}

	/**
	 * @param  array  $errors
	 * @param  string  $message
	 * @param  int  $statusCode
	 * @return JsonResponse
	 */
	public static function error(array $errors = [], string $message = '', int $statusCode = HttpStatusCode::UNPROCESSABLE_ENTITY): JsonResponse
	{
		$Response = new \Rb\Core\Response();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setErrors($errors);

		return $Response->getResponse();
	}
}
