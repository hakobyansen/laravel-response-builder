<?php

namespace Rb\Core;

use Rb\Core\Contracts\IResponse;

class Response implements IResponse
{
	private $_Status;
	private $_StatusCode;
	private $_Message;
	private $_Errors;
	private $_Data;

	/**
	 * @return bool
	 */
	public function getStatus(): bool
	{
		return $this->_Status;
	}

	/**
	 * @param bool $Status
	 * @return $this
	 */
	public function setStatus(bool $Status): Response
	{
		$this->_Status = $Status;
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
	 * @param int $StatusCode
	 * @return $this
	 */
	public function setStatusCode(int $StatusCode): Response
	{
		$this->_StatusCode = $StatusCode;

		// If status code is 2XX then status should be true

		$StatusCode = (string)$StatusCode;

		if ($StatusCode{0} === '2')
		{
			$this->setStatus(true);
		} else
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
	 * @param mixed $Message
	 * @return $this
	 */
	public function setMessage(string $Message): Response
	{
		$this->_Message = $Message;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getErrors()
	{
		return $this->_Errors;
	}

	/**
	 * @param mixed $Errors
	 * @return $this
	 */
	public function setErrors($Errors): Response
	{
		$this->_Errors = $Errors;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->_Data;
	}

	/**
	 * @param mixed $Data
	 * @return $this
	 */
	public function setData($Data): Response
	{
		$this->_Data = $Data;

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
	 * This method uses laravel's response() helper
	 *
	 * @return mixed
	 */
	public function getResponse()
	{
		return response()->json($this->getArray(), $this->getStatusCode());
	}
}
