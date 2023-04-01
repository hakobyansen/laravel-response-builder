<?php

namespace Rb\Core\Contracts;

use Illuminate\Http\JsonResponse;

interface IResponse
{
	/**
	 * @return JsonResponse
	 */
	public function getResponse(): JsonResponse;

	/**
	 * @param array|object|null $data
	 * @return $this
	 */
	public function setData(array|object|null $data): self;

	/**
	 * @return array|object|null
	 */
	public function getData(): array|object|null;

	/**
	 * @param  bool  $status
	 * @return $this
	 */
	public function setStatus(bool $status): self;

	/**
	 * @return bool
	 */
	public function getStatus(): bool;

	/**
	 * @param  int  $statusCode
	 * @return $this
	 */
	public function setStatusCode(int $statusCode): self;

	/**
	 * @return int
	 */
	public function getStatusCode(): int;

	/**
	 * @param  string  $message
	 * @return $this
	 */
	public function setMessage(string $message): self;

	/**
	 * @return mixed
	 */
	public function getMessage();

	/**
	 * @param  array  $errors
	 * @return $this
	 */
	public function setErrors(array $errors): self;

	/**
	 * @return array
	 */
	public function getErrors(): array;
}
