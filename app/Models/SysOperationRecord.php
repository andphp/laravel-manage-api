<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SysOperationRecord
 * @package App\Models
 * @property int id
 * @property string ip	请求ip
 * @property string method	请求方法
 * @property string path	请求路径
 * @property int status	请求状态
 * @property int latency	延迟
 * @property string agent	代理
 * @property string error_message	错误信息
 * @property longtext body	请求Body
 * @property longtext resp	响应Body
 * @property int user_id	用户ID
 * @property datetime created_at
 * @property datetime updated_at
 * @property datetime deleted_at	删除时间 null未删除
 */
class SysOperationRecord extends Model
{
    use SoftDeletes;
    protected $table = 'sys_operation_records';
    protected $fillable = [
        'ip',
        'method',
        'path',
        'status',
        'latency',
        'agent',
        'error_message',
        'body',
        'resp',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
