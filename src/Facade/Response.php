<?php

namespace Rb\Facade;

use Rb\Core\HttpStatusCode;

class Response
{
	/**
	 * @param array $data
	 * @param string $message
	 * @param int $statusCode
	 * @return mixed
	 */
	public static function success(array $data, string $message = '', int $statusCode = HttpStatusCode::OK)
	{
		$Response = new \Rb\Core\Response();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setData($data);

		return $Response->getResponse();
	}

	/**
	 * @param array $errors
	 * @param string $message
	 * @param int $statusCode
	 * @return mixed
	 *
	 * @todo does it make sense to set unprocessable entity to be the default status code?
	 */
	public static function error(array $errors, string $message = '', int $statusCode = HttpStatusCode::UNPROCESSABLE_ENTITY)
	{
		$Response = new \Rb\Core\Response();

		$Response->setStatus(true)
			->setMessage($message)
			->setStatusCode($statusCode)
			->setErrors($errors);

		return $Response->getResponse();
	}
}
