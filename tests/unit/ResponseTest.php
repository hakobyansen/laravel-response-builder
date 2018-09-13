<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RB\Core\Response;

class ResponseTest extends TestCase
{
    public function testStatusTrue()
    {
        $response = new Response();

        $response->setStatus(true);

        $this->assertTrue( $response->getStatus() );
    }

    public function testStatusFalse()
    {
        $response = new Response();

        $response->setStatus(false);

        $this->assertFalse( $response->getStatus() );
    }

    public function testStatusCode()
    {
        $response = new Response();

        $actualCode = 404;

        $response->setStatusCode( $actualCode );

        $this->assertEquals( $response->getStatusCode(), $actualCode );
    }

    public function testMessage()
    {
        $response = new Response();

        $actualMessage = 'Some inspiring message.';

        $response->setMessage( $actualMessage );

        $this->assertEquals( $response->getMessage(), $actualMessage );
    }

    public function testErrors()
    {
        $response = new Response();

        $actualErrors = [
            'name' => ['Name field is required.', 'Name must have minimum length 2.'],
            'age'  => ['Age field is required.', 'Age can not be less than 1']
        ];

        $response->setErrors( $actualErrors );

        $this->assertEquals( $actualErrors, $response->getErrors() );
    }

    public function testGetArray()
    {
        $response = new Response();

        $status  = true;
        $message = 'Awesome response.';
        $data    = [
            'user' => [
                'name' => 'John Smith',
                'age' => 28
            ]
        ];

        $response->setStatus( $status );
        $response->setMessage( $message );
        $response->setData( $data );

        $expectedArray = [
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
            'errors'  => null
        ];

        $this->assertEquals( $expectedArray, $response->getArray() );
    }

    public function testArrayContainsStatus()
    {
        $response    = new Response();

        $requiredKey = 'status';
        $hasKey      = false;

        $responseArr = $response->getArray();

        if( array_key_exists( $requiredKey, $responseArr ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsMessage()
    {
        $response    = new Response();

        $requiredKey = 'message';
        $hasKey      = false;

        $responseArr = $response->getArray();

        if( array_key_exists( $requiredKey, $responseArr ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsData()
    {
        $response    = new Response();

        $requiredKey = 'data';
        $hasKey      = false;

        $responseArr = $response->getArray();

        if( array_key_exists( $requiredKey, $responseArr ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsErrors()
    {
        $response    = new Response();

        $requiredKey = 'errors';
        $hasKey      = false;

        $responseArr = $response->getArray();

        if( array_key_exists( $requiredKey, $responseArr ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }
}