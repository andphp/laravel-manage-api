<?php

/**
 * 加密 支持对象或数组
 */
if (!function_exists('encrypt')) {
    function encrypt($value, $serialize = true)
    {
        return app('encrypter')->encrypt($value, $serialize);
    }
}

/**
 * 解密 支持对象或数组
 */
if (!function_exists('decrypt')) {
    function decrypt($value, $unserialize = true)
    {
        return app('encrypter')->decrypt($value, $unserialize);
    }
}
