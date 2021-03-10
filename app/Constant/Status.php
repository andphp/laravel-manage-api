<?php


namespace App\Constant;


class Status
{
    // ============================ 返回code默认状态码 =====================
    /**
     * 成功响应
     */
    const SUCCESS = 200;

    /**
     * 失败响应
     */
    const ERROR = 999;

    /**
     * 状态：开
     */
    const ON = 1;

    /**
     * 状态：关
     */
    const OFF = 0;

    // ============================ 任务状态 =====================
    /**
     * 未开始
     */
    const TASK_NO_START = 1;
    /**
     * 进行中
     */
    const TASK_ING = 2;
    /**
     * 已完成
     */
    const TASK_COMPLETE = 3;
    /**
     * 超时
     */
    const TASK_OVERTIME = 4;

    // ================================= 流程类型 ========================
    /**
     * 请假
     */
    const LEAVE_FLOW = 'A01';
    /**
     * 出差
     */
    const BUSINESS_TRAVEL_FLOW = 'A02';
    /**
     * 外出
     */
    const GO_OUT_FLOW = 'A03';
    /**
     * 报销
     */
    const REIMBURSE_FLOW = 'A04';
    /**
     * 物品领用
     */
    const GOODS_BORROW_FLOW = 'A05';

    // ============================ 消息通知类型 =====================
    // 0系统通知，1通知公告，2审批消息，3工单提醒，4任务提醒，5日志提醒
    /**
     * 0系统通知
     */
    const MESSAGE_TYPE_SYSTEM = 0;
    /**
     * 1通知公告
     */
    const MESSAGE_TYPE_NOTICE = 1;
    /**
     * 2审批消息
     */
    const MESSAGE_TYPE_APPROVAL = 2;
    /**
     * 3工单提醒
     */
    const MESSAGE_TYPE_ORDER = 3;
    /**
     * 4任务提醒
     */
    const MESSAGE_TYPE_TASK = 4;
    /**
     * 5日志提醒
     */
    const MESSAGE_TYPE_JOURNAL = 5;

    // ============================ 消息阅读状态 =====================
    /**
     * 已读
     */
    const READ = 2;
    /**
     * 未读
     */
    const UNREAD = 1;

    // ============================ 审批状态 =====================

    /**
     * 同意
     */
    const APPROVAL_AGREE = 1;

    /**
     * 拒绝
     */
    const APPROVAL_REFUSE= 2;

}
