<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\SysUserInfo;
use App\Http\Services\AuthService;
use App\Models\SysUser;
use App\Rules\AccountIsEmailOrPhone;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class AuthController extends Controller
{

    /**
     * 登录
     * @param Request $request
     */
    public function signIn(Request $request)
    {

        // 参数验证
        $validatedData = $request->validate([
            'account'   => ['required', new AccountIsEmailOrPhone()],
            'password' => ['required', "between:6,18"],
        ],[],[
            'account' => '登录账号'
        ]);
        // 登录
        [$res,$err]= AuthService::login($validatedData);
        if($err){
            return $this->error($err);
        }

        return new SysUserInfo($res);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
