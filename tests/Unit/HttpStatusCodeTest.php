<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Rb\Core\HttpStatusCode;

class HttpStatusCodeTest extends TestCase
{
	/**
	 * @covers HttpStatusCode::getCodeWithMessage
	 */
	public function testGetCodeWithMessage()
	{
		$okCode = HttpStatusCode::OK;
		$okMessage = HttpStatusCode::getMessageByCode($okCode);

		$this->assertEquals(
			"{$okCode} {$okMessage}",
			HttpStatusCode::getCodeWithMessage($okCode)
		);
	}

	/**
	 * @covers HttpStatusCode::getMessageByCode
	 */
	public function testGetMessageByCode()
	{
		$okCode = HttpStatusCode::OK;
		$okMessage = HttpStatusCode::$statusCodeMap[$okCode];

		$this->assertEquals(
			$okMessage,
			HttpStatusCode::getMessageByCode($okCode),
		);
	}
}
