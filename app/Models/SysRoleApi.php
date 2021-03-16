<?php

namespace App\Models;

/**
 * Class SysRoleApi
 * @package App\Models
 * @property int role_id	角色ID
 * @property int api_id	请求接口ID
 */
class SysRoleApi extends Model
{
    protected $table = 'sys_role_apis';
    protected $fillable = [
        'role_id',
        'api_id',
    ];
}
