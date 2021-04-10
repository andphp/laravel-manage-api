<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DaXiong
 * Date: 2021/4/11
 * Time: 1:41 AM
 */

namespace App\Repositories\Sys;


use App\Models\SysDepartment;
use App\Models\SysUser;
use App\Models\SysUserDepartment;
use App\Repositories\Sys\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    public function getDepartmentRolesByUser(SysUser $user)
    {
        $departmentIDs = $this->getDepartmentIDsByUser($user);
        $roleIdsArray = SysDepartment::query()->whereIn('id', $departmentIDs)->get('role_ids')->toArray();
        $roleIds = array_column($roleIdsArray, 'role_ids');
        return array_map(function ($id) {
            return intval($id);
        }, array_unique(explode(',', implode(',', $roleIds))));
    }

    public function getDepartmentIDsByUser(SysUser $user)
    {
        $selectArray = SysUserDepartment::query()->where('user_id', $user->id)->get()->toArray();
        return array_column($selectArray, 'department_id');
    }


}