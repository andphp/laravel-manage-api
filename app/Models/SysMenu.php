<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SysMenu
 * @package App\Models
 * @property int id
 * @property int menu_level	菜单等级
 * @property int parent_id	父菜单ID
 * @property string path	路由path
 * @property string name	路由name
 * @property int hidden	是否显示在菜单中显示路由（默认值：false）
 * @property string component	对应前端文件路径
 * @property int sort	排序标记
 * @property int keep_alive	附加属性:当前路由是否缓存（默认值：true）
 * @property int default_menu	附加属性:
 * @property string title	附加属性:标题
 * @property string icon	附加属性:icon
 * @property int close_tab	附加属性:是否隐藏关闭按钮
 * @property int hidden_tab	附加属性:是否不显示多标签页
 * @property int role_mode	附加属性: 1[oneOf] 数组内拥有任一角色，返回True(等价第1种数据);2[allOf] 数组内所有角色都拥有，返回True; 3[except] 不拥有数组内任一角色，返回True(取反)
 * @property datetime created_at
 * @property datetime updated_at
 * @property datetime deleted_at	删除时间 null未删除
 */
class SysMenu extends Model
{
    use SoftDeletes;
    protected $table = 'sys_menus';
    protected $fillable = [
        'menu_level',
        'parent_id',
        'path',
        'name',
        'hidden',
        'component',
        'sort',
        'keep_alive',
        'default_menu',
        'title',
        'icon',
        'close_tab',
        'hidden_tab',
        'role_mode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
