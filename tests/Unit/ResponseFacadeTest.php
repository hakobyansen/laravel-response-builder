<?php

namespace Tests\Unit;

use Illuminate\Http\JsonResponse;
use Orchestra\Testbench\TestCase;
use Rb\Core\HttpStatusCode;
use Rb\Facade\Response;

class ResponseFacadeTest extends TestCase
{
	/**
	 * @covers \Rb\Facade\Response::success()
	 */
	public function testSuccess()
	{
		$mockData = [
			'users' => [
				[
					'name' => 'John',
				],
				[
					'name' => 'Bob'
				],
				[
					'name' => 'Alice'
				]
			],
		];

		/**
		 * @var JsonResponse
		 */
		$Response = Response::success($mockData, 'List of users.');


		$this->assertEquals($mockData['users'][0]['name'], $Response->getData()->data->users[0]->name);
		$this->assertEquals($mockData['users'][1]['name'], $Response->getData()->data->users[1]->name);
		$this->assertEquals($mockData['users'][2]['name'], $Response->getData()->data->users[2]->name);
		$this->assertTrue($Response->getData()->status);
		$this->assertEquals(HttpStatusCode::OK, $Response->getStatusCode());
		$this->assertEquals('List of users.', $Response->getData()->message);
		$this->assertEmpty($Response->getData()->errors);

		$Response = Response::success($mockData, 'Created List of users.', HttpStatusCode::CREATED);

		$this->assertEquals(HttpStatusCode::CREATED, $Response->getStatusCode());
	}

	/**
	 * @covers \Rb\Facade\Response::error
	 */
	public function testError()
	{
		$mockData = [
			'first_name' => [
				'First name is required.',
			],
			'email' => [
				'Email is required',
			]
		];

		$Response = Response::error($mockData, 'Invalid input.', HttpStatusCode::UNPROCESSABLE_ENTITY);
		$this->assertEquals($mockData['first_name'][0], $Response->getData()->errors->first_name[0]);
		$this->assertEquals($mockData['email'][0], $Response->getData()->errors->email[0]);
		$this->assertFalse($Response->getData()->status);
		$this->assertEquals(HttpStatusCode::UNPROCESSABLE_ENTITY, $Response->getStatusCode());
		$this->assertEquals('Invalid input.', $Response->getData()->message);
		$this->assertEmpty($Response->getData()->data);
	}
}
