<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\TestCase;
use Rb\Core\RbValidator;

class RbValidatorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }

	/**
	 * @covers RbValidator::validate
	 */
    public function testValidate()
    {
        $data = [
            'name' => 'John',
            'age'  => 26,
            'city' => 'New York'
        ];

        $rules = [
            'name' => 'string',
            'age' => 'integer',
            'city' => 'required'
        ];

        $validator = Validator::make( $data, $rules );

        $this->assertTrue(  RbValidator::validate( $validator ) );
    }
}
