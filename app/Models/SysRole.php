<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SysRole
 * @package App\Models
 * @property int id
 * @property string role_name	角色名
 * @property string parent_id	父角色ID
 * @property string default_router	默认菜单
 * @property datetime created_at
 * @property datetime updated_at
 */
class SysRole extends Model
{
    protected $table = 'sys_roles';
    protected $fillable = [
        'role_name',
        'parent_id',
        'default_router',
        'created_at',
        'updated_at',
    ];
}
