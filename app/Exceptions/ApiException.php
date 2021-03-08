<?php


namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $code = 10000;
    protected $statusCode = 200;
    protected $message = 'System error !';
    protected $data = [];

    public function __construct(array $params = [])
    {
        if (array_key_exists('data', $params)) {
            $this->data = $params['data'];
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this->message = $params['msg'];
        }
        if (array_key_exists('statusCode', $params)) {
            $this->statusCode = $params['statusCode'];
        }
        parent::__construct($this->message, $this->code);
    }

    final public function getStatusCode()
    {
        return $this->statusCode;
    }

    final public function getErrorData()
    {
        return $this->data;
    }
}
