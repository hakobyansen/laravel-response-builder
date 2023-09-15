<?php

namespace Rb\Facade;

use Illuminate\Http\JsonResponse;
use Rb\Core\ErrorCode;
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
	public static function success(
		array|object|null $data = null,
		string $message = '',
		int $statusCode = HttpStatusCode::OK
	): JsonResponse
	{
		$Response = new CoreResponse();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data);

		return $Response->getResponse();
	}

    /**
     * @param array|object|null $data
     * @param string $message
     * @param array|null $errors
     * @param int $statusCode
     * @param ErrorCode|null $errorCode
     * @return JsonResponse
     */
	public static function error(
		array|object|null $data = null,
		string $message = 'Something went wrong...',
        ?array $errors = null,
        int $statusCode = HttpStatusCode::INTERNAL_SERVER_ERROR,
        ?ErrorCode $errorCode = null,
    ): JsonResponse
	{
		$Response = new CoreResponse();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data)
			->setErrors($errors)
            ->setErrorCode($errorCode);

		return $Response->getResponse();
	}
}
