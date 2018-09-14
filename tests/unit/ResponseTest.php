<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RB\Core\Response;

class ResponseTest extends TestCase
{
    private $_Response;

    public function setUp()
    {
        $this->_Response = new Response();

        $this->_Response->setStatus( true )
            ->setStatusCode( 200 );
    }

    public function testStatusTrue()
    {
        $this->_Response->setStatus(true);

        $this->assertTrue( $this->_Response->getStatus() );
    }

    public function testStatusFalse()
    {
        $this->_Response->setStatus(false);

        $this->assertFalse( $this->_Response->getStatus() );
    }

    public function testStatusCode()
    {
        $actualCode = 404;

        $this->_Response->setStatusCode( $actualCode );

        $this->assertEquals( $this->_Response->getStatusCode(), $actualCode );
    }

    public function testMessage()
    {
        $actualMessage = 'Some inspiring message.';

        $this->_Response->setMessage( $actualMessage );

        $this->assertEquals( $this->_Response->getMessage(), $actualMessage );
    }

    public function testErrors()
    {
        $actualErrors = [
            'name' => ['Name field is required.', 'Name must have minimum length 2.'],
            'age'  => ['Age field is required.', 'Age can not be less than 1']
        ];

        $this->_Response->setErrors( $actualErrors );

        $this->assertEquals( $actualErrors, $this->_Response->getErrors() );
    }

    public function testGetArray()
    {
        $status  = true;
        $message = 'Awesome response.';
        $data    = [
            'user' => [
                'name' => 'John Smith',
                'age' => 28
            ]
        ];

        $this->_Response->setStatus( $status )
            ->setMessage( $message )
            ->setData( $data );

        $expectedArray = [
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
            'errors'  => null
        ];

        $this->assertEquals( $expectedArray, $this->_Response->getArray() );
    }

    public function testArrayContainsStatus()
    {
        $requiredKey = 'status';
        $hasKey      = false;

        if( array_key_exists( $requiredKey,  $this->_Response->getArray() ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsMessage()
    {
        $requiredKey = 'message';
        $hasKey      = false;

        if( array_key_exists( $requiredKey,  $this->_Response->getArray() ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsData()
    {
        $requiredKey = 'data';
        $hasKey      = false;

        if( array_key_exists( $requiredKey,  $this->_Response->getArray() ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }

    public function testArrayContainsErrors()
    {
        $requiredKey = 'errors';
        $hasKey      = false;

        if( array_key_exists( $requiredKey,  $this->_Response->getArray() ) )
        {
            $hasKey = true;
        }

        $this->assertTrue( $hasKey );
    }
}