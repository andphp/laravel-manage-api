<?php

namespace App\Models;

/**
 * Class SysRoleMenu
 * @package App\Models
 * @property int role_id	角色ID
 * @property int menu_id	菜单ID
 * @property string ability	权限：序列化["READ","WRITE","DELETE"]
 */
class SysRoleMenu extends Model
{
    protected $table = 'sys_role_menus';
    protected $fillable = [
        'role_id',
        'menu_id',
        'ability',
    ];

    public function setAbilityAttribute($array)
    {
        $this->attributes['ability'] = unserialize($array);
    }

    public function getAbilityAttribute()
    {
        return unserialize($this->attributes['ability']);
    }
}
