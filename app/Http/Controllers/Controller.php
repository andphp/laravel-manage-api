<?php

namespace App\Http\Controllers;

use App\Constant\Error;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use AndPHP\LaravelApiOutput\Output;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 响应成功
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function success($data = [], string $message = 'success')
    {
        return Output::output($data, $message, 200, 200);
    }

    /**
     * 响应失败
     * @param int $code
     * @param null $message
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function error(int $code = 999, $message = null)
    {

        if (!$message) {
            $message = (new Error())->getMessage($code);
        }
        if (!$message) {
            $message = "failed";
        }

        return Output::output([], $message, $code, 200);
    }

}
