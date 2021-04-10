<?php

namespace App\Models;


/**
 * Class SysDepartment
 * @package App\Models
 * @property int id 
 * @property string department_name 部门名称
 * @property string parent_id 父级部门ID(不继承角色权限)
 * @property string role_ids 部门拥有的角色权限ID【逗号分隔】
 * @property datetime created_at 
 * @property datetime updated_at 
 */
class SysDepartment extends Model
{


       protected $table = 'sys_departments';
       protected $fillable = [
           'department_name', 'parent_id', 'role_ids', 'created_at', 'updated_at'
       ];

}
