<?php

namespace Rb\Core;

class ErrorCode
{
	public function __construct(
		private ?string $type = null,
		private ?string $subType = null
	)
	{
	}

	public function getType(): ?string
	{
		return $this->type;
	}

	public function setType(?string $type): ErrorCode
	{
		$this->type = $type;
		return $this;
	}

	public function getSubType(): ?string
	{
		return $this->subType;
	}

	public function setSubType(?string $subType): ErrorCode
	{
		$this->subType = $subType;
		return $this;
	}
}
