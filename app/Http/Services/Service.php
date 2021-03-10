<?php


namespace App\Http\Services;


use App\Traits\OutPut;

class Service
{


    public function error(int $code = 999, string $message = null, $data = null)
    {
        return [
            'data' => $data,
            'err'  => [
                'code' => $code,
                'msg'  => $message,
            ],
        ];
    }

}
