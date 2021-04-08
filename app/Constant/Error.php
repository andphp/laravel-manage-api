<?php


namespace App\Constant;

use AndPHP\Constant\Constant;


/**
 * Class Error
 * @package App\Constant
 */
class Error extends Constant
{

    public function __init()
    {
        $this->class = __CLASS__;

    }


    // =============================== 系统默认错误码 ====================

    // 授权／令牌请求接口返回码

    /**
     * 请求成功
     */
    const SUCCESS = 0;

    /**
     * 未知错误
     */
    const UNKNOWN_ERROR = 9999;

    /**
     * 非法的请求参数
     */
    const INVALID_PARAMS = 10000;

    /**
     * 用户认证失败
     */
    const INVALID_CLIENT = 10001;

    /**
     * 非法的授权信息
     */
    const INVALID_GRANT = 10002;

    /**
     * scope信息无效或超出范围
     */
    const INVALID_SCOPE = 10003;

    /**
     * 令牌已过期
     */
    const EXPIRED_TOKEN = 10004;

    /**
     * 没有权限,拒绝访问
     */
    const ACCESS_DENIED = 10005;


    // =============================== 业务错误码 ========================

    /**
     * 应用标识+功能域+错误类型+错误编码
     * 错误码位数：8位
     * 错误码示例：I102P001
     * 使用规范：只增不改，避免混乱
     *
     * 应用标识(2位字母和数字)
     * 管理后台：01
     * AXXX平台：A2
     * VXXX平台：V1
     * ZXXX平台：Z1
     *
     * 功能域(2位数字)，services服务
     * AuthService【权限】：01
     * X1相关：01
     * X2相关：02
     * X3相关：03
     *
     * 错误类型(1位字母)
     * 参数错误：1
     * 业务错误：2
     * 系统错误：3
     * 网络错误：4
     * 数据库错误：5
     * 缓存错误：6
     * RPC错误：7
     * 文件IO错误：8
     * 其他错误：9
     *
     * 错误编码(3位数字)
     * 自增即可
     */

    // 管理后台-AuthService【权限】

    /**
     * 用户不存在
     */
     const NOT_USER_EXISTS = 01011001;

    /**
     * 密码错误
     */
     const PASSWORD_ERROR = 01011002;
}
