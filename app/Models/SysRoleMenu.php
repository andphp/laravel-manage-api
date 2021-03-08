<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SysRoleMenu
 * @package App\Models
 * @property int role_id	角色ID
 * @property int menu_id	菜单ID
 */
class SysRoleMenu extends Model
{
    protected $table = 'sys_role_menus';
    protected $fillable = [
        'role_id',
        'menu_id',
    ];
}
