<?php

namespace App\Http\Controllers\Sys;


use App\Http\Controllers\Controller;
use App\Http\Resources\SysUserInfo;
use App\Services\Sys\AuthService;
use App\Rules\AccountRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    /**
     * 登录
     * @param Request $request
     * @return $this
     * @throws \App\Exceptions\ApiException
     */
    public function signIn(Request $request)
    {

        // 参数验证
        $validatedData = $request->validate([
            'account' => [
                'required',
                new AccountRules()
            ],
            'password' => [
                'required',
                "between:6,18"
            ],
        ], [], [
            'account' => '登录账号'
        ]);

        // 登录
        $token = AuthService::login($validatedData);

        return $this->success([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('admin')->factory()->getTTL() * 60
        ]);
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function info(Request $request){

        $user = AuthService::getUserInfo();

        return $this->success($user);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function resetPassword(Request $request)
    {
        $user = $request->user();
        $user->update(['password' => $request->password]);
        $token = Auth::guard('api')->refresh();
        return $this->success(null,'修改密码成功');
    }
}
