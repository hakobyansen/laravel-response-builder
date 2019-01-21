<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\TestCase;
use RB\Core\RBValidator;

class RBValidatorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }

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

        $this->assertTrue(  RBValidator::validate( $validator ) );
    }
}