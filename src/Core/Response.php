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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_Status;
    }

    /**
     * @param mixed $Status
     * @return Response
     */
    public function setStatus($Status)
    {
        $this->_Status = $Status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->_StatusCode;
    }

    /**
     * @param mixed $StatusCode
     * @return Response
     */
    public function setStatusCode($StatusCode)
    {
        $this->_StatusCode = $StatusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->_Message;
    }

    /**
     * @param mixed $Message
     * @return Response
     */
    public function setMessage($Message)
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
     * @return Response
     */
    public function setErrors($Errors)
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
     * @return Response
     */
    public function setData($Data)
    {
        $this->_Data = $Data;

        return $this;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return [
            'status' => $this->getStatus(),
            'message' => $this->getMessage(),
            'data' => $this->getData(),
            'errors' => $this->getErrors()
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