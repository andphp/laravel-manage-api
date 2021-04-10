<?php

/**
 * Created by PhpStorm.
 * User: DaXiong
 * Date: 2021/4/11
 * Time: 1:39 AM
 */

namespace App\Repositories\Sys\Interfaces;


use App\Models\SysUser;

interface DepartmentRepositoryInterface
{

    public function getDepartmentRolesByUser(SysUser $user);
}