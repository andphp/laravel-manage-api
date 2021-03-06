<?php

/**
 * 将下划线命名数组键名转换为驼峰式命名数组
 */
if (!function_exists('camelCase')) {
    function camelCase($arr, $ucfirst = FALSE)
    {
        if ($arr === null) {
            return "";
        }
        if (!is_array($arr) && !is_object($arr)) {   //如果非数组原样返回
            return $arr;
        }
        $temp = [];
        if (is_object($arr) && count((array)$arr) > 0) {
            $arr = (array)$arr;
        }
        if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                $key1 = toCamelCase($key, FALSE);
                $value1 = camelCase($value);
                $temp[$key1] = $value1;
            }
        }
        return $temp;
    }
}

/**
 * 将下划线命名转换为驼峰式命名
 */
if (!function_exists('toCamelCase')) {
    function toCamelCase($str, $ucfirst = true)
    {
        $str = ucwords(str_replace('_', ' ', $str));
        $str = str_replace(' ', '', lcfirst($str));
        return $ucfirst ? ucfirst($str) : $str;
    }
}

/**
 * 驼峰命名转下划线命名
 */
if (!function_exists('toUnderScore')) {
    function toUnderScore($str)
    {
        $dstr = preg_replace_callback('/([A-Z]+)/',function($matchs)
        {
            return '_'.strtolower($matchs[0]);
        },$str);
        return trim(preg_replace('/_{2,}/','_',$dstr),'_');
    }
}

if (!function_exists('randomStr')) {
    /**
     * 生成随机字符串
     * @return string
     */
    function randomStr($len = 6)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $str = "";
        for ($i = 0; $i < $len; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}
