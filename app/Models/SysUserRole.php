<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SysUserRole
 * @package App\Models
 * @property int user_id	用户ID
 * @property int role_id	角色ID
 */
class SysUserRole extends Model
{
    protected $table = 'sys_user_roles';
    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
