<?php

namespace RB\Core\Contracts;

interface IResponse
{
	public function getArray(): array;

	public function getResponse();

	public function getData();

	public function getStatus();

	public function getStatusCode();

	public function getMessage();

	public function getErrors();
}
