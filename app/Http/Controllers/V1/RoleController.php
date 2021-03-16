<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\SysRole;
use App\Models\SysUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RoleController extends Controller
{

    /**
     * 列表查询
     */
    public function list()
    {

        return $this->success(SysRole::query()->get()->toArray());
    }

    /**
     * 创建新增
     */
    public function create(Request $request)
    {
        // 验证
        $validatedData = $request->validate([
            'role_name'      => ['required'],
            'parent_id'      => ['nullable', 'integer'],
            'default_router' => ['nullable'],
        ], [], [
            'role_name' => '角色名称',
            'parent_id' => '上级ID',
        ]);

        if (SysRole::query()->firstOrCreate(SysRole::fillableFromArray($validatedData))) {
            return $this->success();
        }
        return $this->error();
    }

    /**
     * 指定ID查询
     */
    public function show()
    {
        $model = SysUser::query()->find(2);
        $model->nickname;
    }


    /**
     * 更新
     */
    public function update()
    {
        //
    }

    /**
     * 删除
     */
    public function destroy()
    {
        //
    }
}
