<?php

namespace Rb\Core;

use Illuminate\Http\JsonResponse;
use Rb\Core\Contracts\IResponse;

class Response implements IResponse
{
	/**
	 * @var bool
	 */
	private bool $_Status;

	/**
	 * @var int
	 */
	private int $_StatusCode;

	/**
	 * @var string|null
	 */
	private ?string $_Message = '';

	/**
	 * @var array
	 */
	private array $_Errors = [];

	/**
	 * @var array
	 */
	private array $_Data = [];

	/**
	 * @return bool
	 */
	public function getStatus(): bool
	{
		return $this->_Status;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setStatus(bool $status): Response
	{
		$this->_Status = $status;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getStatusCode(): int
	{
		return $this->_StatusCode;
	}

	/**
	 * @param int $statusCode
	 * @return $this
	 */
	public function setStatusCode(int $statusCode): Response
	{
		$this->_StatusCode = $statusCode;

		// If status code is 2XX then status should be true

		$statusCode = (string)$statusCode;

		if ($statusCode[0] === '2')
		{
			$this->setStatus(true);
		}
		else
		{
			$this->setStatus(false);
		}

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getMessage(): ?string
	{
		return $this->_Message;
	}

	/**
	 * @param mixed $message
	 * @return $this
	 */
	public function setMessage(string $message): Response
	{
		$this->_Message = $message;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getErrors(): array
	{
		return $this->_Errors;
	}

	/**
	 * @param  array  $errors
	 * @return $this
	 */
	public function setErrors(array $errors): Response
	{
		$this->_Errors = $errors;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->_Data;
	}

	/**
	 * @param  array  $data
	 * @return $this
	 */
	public function setData(array $data): Response
	{
		$this->_Data = $data;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getArray(): array
	{
		return [
			'status' => $this->getStatus(),
			'message' => $this->getMessage(),
			'data' => $this->getData(),
			'errors' => $this->getErrors()
		];
	}

	/**
	 * This method uses Laravel response() helper
	 *
	 * @return JsonResponse
	 */
	public function getResponse(): JsonResponse
	{
		return response()->json($this->getArray(), $this->getStatusCode());
	}
}
