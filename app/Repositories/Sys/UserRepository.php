<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DaXiong
 * Date: 2021/4/11
 * Time: 4:00 AM
 */

namespace App\Repositories\Sys;


use App\Models\SysUser;
use App\Models\SysUserRole;
use App\Repositories\Sys\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function getUserRolesByUser(SysUser $user)
    {
        $roleIdsArray = SysUserRole::query()->where('user_id',$user->id)->get('role_id')->toArray();
        return array_column($roleIdsArray, 'role_id');
    }
}