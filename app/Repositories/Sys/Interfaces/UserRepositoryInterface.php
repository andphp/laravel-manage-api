<?php

/**
 * Created by PhpStorm.
 * User: DaXiong
 * Date: 2021/4/11
 * Time: 4:00 AM
 */

namespace App\Repositories\Sys\Interfaces;


use App\Models\SysUser;

interface UserRepositoryInterface
{
    public function getUserRolesByUser(SysUser $user);
}