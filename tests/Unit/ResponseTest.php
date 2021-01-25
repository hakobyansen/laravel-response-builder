<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Rb\Core\Response;

class ResponseTest extends TestCase
{
	private Response $_Response;

	public function setUp(): void
	{
		$this->_Response = new Response();

		$this->_Response->setStatus(true)
			->setStatusCode(200);
	}

	/**
	 * @covers Response::setStatus()
	 * @covers Response::getStatus()
	 */
	public function testStatus()
	{
		$this->_Response->setStatus(true);
		$this->assertTrue($this->_Response->getStatus());

		$this->_Response->setStatus(false);
		$this->assertFalse($this->_Response->getStatus());
	}

	/**
	 * @covers Response::setStatusCode()
	 * @covers Response::getStatusCode()
	 */
	public function testStatusCode()
	{
		$actualCode = 404;

		$this->_Response->setStatusCode($actualCode);

		$this->assertEquals($actualCode, $this->_Response->getStatusCode());
	}

	/**
	 * @covers Response::setStatusCode()
	 * @covers Response::getStatusCode()
	 */
	public function testStatusDependedOnStatusCode()
	{
		$code = 201;

		$this->_Response->setStatusCode($code);

		$this->assertTrue($this->_Response->getStatus());

		$code = 404;

		$this->_Response->setStatusCode($code);

		$this->assertFalse($this->_Response->getStatus());
	}

	/**
	 * @covers Response::setMessage()
	 * @covers Response::getMessage()
	 */
	public function testMessage()
	{
		$message = 'Some inspiring message.';

		$this->_Response->setMessage($message);

		$this->assertEquals($message, $this->_Response->getMessage());
	}

	/**
	 * @covers Response::setErrors()
	 * @covers Response::getErrors()
	 */
	public function testErrors()
	{
		$errors = [
			'name' => ['Name field is required.', 'Name must have minimum length 2.'],
			'age' => ['Age field is required.', 'Age can not be less than 1']
		];

		$this->_Response->setErrors($errors);

		$this->assertEquals($errors, $this->_Response->getErrors());
	}

	/**
	 * @covers Response::getArray()
	 */
	public function testGetArray()
	{
		$status = true;
		$message = 'Awesome response.';
		$data = [
			'user' => [
				'name' => 'John Smith',
				'age' => 28
			]
		];

		$this->_Response->setStatus($status)
			->setMessage($message)
			->setData($data);

		$expectedArray = [
			'status' => $status,
			'message' => $message,
			'data' => $data,
			'errors' => []
		];

		$this->assertEquals($expectedArray, $this->_Response->getArray());
	}

	/**
	 * @covers Response::getArray()
	 */
	public function testArrayContainsStatus()
	{
		$requiredKey = 'status';
		$hasKey = false;

		if (array_key_exists($requiredKey, $this->_Response->getArray())) {
			$hasKey = true;
		}

		$this->assertTrue($hasKey);
	}

	/**
	 * @covers Response::getArray()
	 */
	public function testArrayContainsMessage()
	{
		$requiredKey = 'message';
		$hasKey = false;

		if (array_key_exists($requiredKey, $this->_Response->getArray())) {
			$hasKey = true;
		}

		$this->assertTrue($hasKey);
	}

	/**
	 * @covers Response::getArray()
	 */
	public function testArrayContainsData()
	{
		$requiredKey = 'data';
		$hasKey = false;

		if (array_key_exists($requiredKey, $this->_Response->getArray())) {
			$hasKey = true;
		}

		$this->assertTrue($hasKey);
	}

	/**
	 * @covers Response::getArray()
	 */
	public function testArrayContainsErrors()
	{
		$requiredKey = 'errors';
		$hasKey = false;

		if (array_key_exists($requiredKey, $this->_Response->getArray())) {
			$hasKey = true;
		}

		$this->assertTrue($hasKey);
	}
}
