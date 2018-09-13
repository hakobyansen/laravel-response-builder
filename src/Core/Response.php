<?php

namespace RB\Core;

class Response implements IResponse
{
    private $_Status;
    private $_StatusCode;
    private $_Message;
    private $_Errors;
    private $_Data;

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->_Status;
    }

    /**
     * @param bool $Status
     * @return $this
     */
    public function setStatus( bool $Status ): self
    {
        $this->_Status = $Status;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->_StatusCode;
    }

    /**
     * @param int $StatusCode
     * @return $this
     */
    public function setStatusCode( int $StatusCode ): self
    {
        $this->_StatusCode = $StatusCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->_Message;
    }

    /**
     * @param mixed $Message
     * @return $this
     */
    public function setMessage( string $Message ): self
    {
        $this->_Message = $Message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->_Errors;
    }

    /**
     * @param mixed $Errors
     * @return $this
     */
    public function setErrors( $Errors ): self
    {
        $this->_Errors = $Errors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->_Data;
    }

    /**
     * @param mixed $Data
     * @return $this
     */
    public function setData( $Data ): self
    {
        $this->_Data = $Data;

        return $this;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return [
            'status'  => $this->getStatus(),
            'message' => $this->getMessage(),
            'data'    => $this->getData(),
            'errors'  => $this->getErrors()
        ];
    }

    /**
     * This method uses laravel's response() helper
     *
     * @return mixed
     */
    public function getResponse()
    {
        return response()->json($this->getArray(), $this->getStatusCode());
    }
}