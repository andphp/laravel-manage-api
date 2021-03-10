<?php

if (!function_exists('outJson')) {
    function outJson($data, $message, $code, $status,$header = [])
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
        return response()->json($result, $status)->withHeaders($header)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
