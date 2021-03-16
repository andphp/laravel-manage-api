<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SysApi
 * @package App\Models
 * @property int id
 * @property string path	api路径
 * @property string description	api中文描述
 * @property string api_group	api组
 * @property string method	请求方式
 * @property datetime created_at
 * @property datetime updated_at
 * @property datetime deleted_at	删除时间 null未删除
 */
class SysApi extends Model
{
    use SoftDeletes;
    protected $table = 'sys_menus';
    protected $fillable = [
        'path',
        'description',
        'api_group',
        'method',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
