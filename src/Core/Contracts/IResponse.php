<?php

namespace RB\Core\Contracts;

interface IResponse
{
	public function getResponse();

	public function setData( $data );
	public function getData();

	public function setStatus( bool $status );
	public function getStatus();

	public function setStatusCode( int $statusCode );
	public function getStatusCode();

	public function setMessage( string $message );
	public function getMessage();

	public function setErrors( $errors );
	public function getErrors();
}
