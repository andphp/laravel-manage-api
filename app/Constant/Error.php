<?php


namespace App\Constant;


/**
 * cd
 * Class Error
 * @package App\Constant
 */
class Error extends BaseConstant
{

    public function __init()
    {
        $this->class = __CLASS__;
    }

    /**
     * token登录失效
     */
    const INVALID_TOKEN = 401;

    /**
     * 没有权限
     */
    const INVALID_AUTH = 403;

    /**
     * 执行失败，请稍后再试！
     */
    const RESPONSE_FAILED = 999;

    /**
     * 用户 不存在
     */
    const NOT_USER_EXISTS = 10001;

    /**
     * 手机号 已存在
     */
    const PHONE_ALREADY_EXISTS = 10002;

    /**
     * 验证码 发送失败
     */
    const VERIFICATION_CODE_SENDING_FAILED = 10003;

    /**
     * 验证码 无效
     */
    const VERIFICATION_CODE_INVALID = 10004;

    /**
     * 您的验证码已过期请重新发送
     */
    const VERIFICATION_CODE_EXPIRED = 10005;

    /**
     * 您的验证码输入有误请重新输入
     */
    const VERIFICATION_CODE_ERROR = 10006;

    /**
     * 密码错误
     */
    const PASSWORD_ERROR = 10007;

    /**
     * 审核信息不能为空
     */
    const APPROVAL_MSG_NOT_NULL = 10008;

    /**
     * 状态值越界
     */
    const TASK_STATUS_ERROR = 20001;


    /**
     * 数据不能为空
     */
    const DATA_ERROR = 30001;
}
