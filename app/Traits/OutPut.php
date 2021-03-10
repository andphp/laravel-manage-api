<?php


namespace App\Traits;


use App\Constant\Error;
use App\Constant\Status;

trait OutPut
{
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
        return $this->outJson($data, $message, Status::SUCCESS, 200);
    }

    /**
     * 响应失败
     * @param int $code
     * @param null $message
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function error($code = 999, $message = null)
    {
        $resultCode = Status::ERROR;
        $resultMsg = null;
        if(is_array($code)){
            $resultCode = $code['code'];
            $resultMsg = $code['msg'];
        }

        if ($message) {
            $resultMsg = $message;
        }
        if (!$resultMsg) {
            $resultMsg = (new Error())->getMessage($resultCode);
        }
        if (!$resultMsg) {
            $resultMsg = "failed";
        }

        return $this->outJson([], $resultMsg, $resultCode, 200);
    }

    public function outJson($data, $message, $code, $status)
    {
        // 返回json数据
        $result = [
            'code'    => $code,
            'msg' => $message,
            'data'    => camelCase($data),
        ];
        $headerKey = base64_decode('WC1Qb3dlcmVkLUJ5');
        $headerValue = base64_decode('QW5kUEhQ');
        self::$header[$headerKey] = $headerValue;
        //todo 断言 format 输出不同类型
        return response()->json($result, $status)->withHeaders(self::$header)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }


}
