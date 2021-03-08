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
     * 默认响应头
     * @var array
     */
    public static $header = [];

    /**
     * 设置返回 Header
     * @param $key
     * @param $values
     * @return $this
     */
    public function setHeader($key, $values)
    {
        self::$header[$key] = $values;
        return $this;
    }

    /**
     * 响应成功
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function success($data = [], string $message = 'success')
    {
        return $this->outJson($data, $message, 200, 200);
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

        return $this->outJson([], $message, $code, 200);
    }

    public function outJson($data, $message, $code, $status)
    {
        // 返回json数据
        $result = [
            'code'    => $code,
            'message' => $message,
            'data'    => camelCase($data),
        ];
        $headerKey = base64_decode('WC1Qb3dlcmVkLUJ5');
        $headerValue = base64_decode('QW5kUEhQ');
        self::$header[$headerKey] = $headerValue;
        //todo 断言 format 输出不同类型
        return response()->json($result, $status)->withHeaders(self::$header)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
