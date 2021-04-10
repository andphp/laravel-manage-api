<?php


namespace App\Services;


use App\Constant\Error;
use App\Exceptions\ApiException;

class Service
{


    public function error($error)
    {
        $data = array();
        if (is_numeric($error)) {
            $data['code'] = $error;
            $data['msg'] = ((new Error())->getMessage($error)) ?? 'Service unknown error';
        }

        if (is_string($error)) {
            $data['msg'] = $error;
        }
        if (is_array($error)) {
            $data = $error;
        }

        throw new ApiException($data);
    }

}
