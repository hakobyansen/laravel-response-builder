<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RB\Core\HttpStatusCodes;

class HttpStatusCodesTest extends TestCase
{
    public function testGetCodeWithMessage()
    {
        $okCode    = HttpStatusCodes::OK;
        $okMessage = HttpStatusCodes::getMessageByCode( $okCode );

        $this->assertEquals(
            HttpStatusCodes::getCodeWithMessage( $okCode ),
            "{$okCode} {$okMessage}"
        );
    }

    public function testGetMessageByCode()
    {
        $okCode    = HttpStatusCodes::OK;
        $okMessage = HttpStatusCodes::$statusCodeMap[ $okCode ];

        $this->assertEquals(
            HttpStatusCodes::getMessageByCode( $okCode ),
            $okMessage
        );
    }
}