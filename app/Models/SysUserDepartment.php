<?php

namespace App\Models;


/**
 * Class SysUserDepartment
 * @package App\Models
 * @property int user_id 用户ID
 * @property int department_id 部门ID
 */
class SysUserDepartment extends Model
{


       protected $table = 'sys_user_departments';
       protected $fillable = [
           'user_id', 'department_id'
       ];

}
