<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RB\Core\HttpStatusCode;

class HttpStatusCodesTest extends TestCase
{
	public function testGetCodeWithMessage()
	{
		$okCode = HttpStatusCode::OK;
		$okMessage = HttpStatusCode::getMessageByCode($okCode);

		$this->assertEquals(
			HttpStatusCode::getCodeWithMessage($okCode),
			"{$okCode} {$okMessage}"
		);
	}

	public function testGetMessageByCode()
	{
		$okCode = HttpStatusCode::OK;
		$okMessage = HttpStatusCode::$statusCodeMap[$okCode];

		$this->assertEquals(
			HttpStatusCode::getMessageByCode($okCode),
			$okMessage
		);
	}
}
