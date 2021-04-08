<?php

namespace App\Http\Services;


use App\Constant\Error;
use App\Librarys\Jwt\Token;
use App\Models\SysUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthService
 * @package App\Http\Services
 */
class AuthService extends Service
{

    /**
     * @param $method
     * @param $parameters
     * @return array
     */
    public static function __callStatic($method, $parameters)
    {

        //注意这里，通过延迟静态绑定，仍然new了一个实例
        return (new static)->{$method}(...$parameters);

    }

    /**
     * @param $validatedData
     * @return array|string
     */
    private function login($validatedData)
    {
        $account = $validatedData['account'];
        $password = $validatedData['password'];

        $where = [
            [
                'phone',
                '=',
                $account
            ],
            [
                'email',
                '=',
                $account,
                'or'
            ],
        ];

        // 验证用户
        $user = SysUser::query()->where($where)->first();

        if (!$user) {
            $this->error(Error::NOT_USER_EXISTS);
        }

        // 验证密码
        if (!Hash::check($password, $user->password)) {
            $this->error(Error::PASSWORD_ERROR);
        }


        $token = Auth::guard('admin')->fromUser($user);
        if ($token) {
            if ($user->last_token) {
                try {
                    JWTAuth::setToken($user->last_token)->invalidate();
                } catch (TokenExpiredException $e) {
                    //因为让一个过期的token再失效，会抛出异常，所以我们捕捉异常，不需要做任何处理
                }
            }
            $user->last_token = $token;
            $user->save();
            return 'bearer ' . $token;
        }
        $this->error('账号或密码错误');
    }

    public function register($validatedData)
    {
        $account = $validatedData['account'];
        $password = $validatedData['password'];

        SysUser::query()->create([
            'phone' => 13983854512,
            'email' => "139838545122qq.com",
            'password' => Hash::make($password),
            'username' => substr((string)($account), -4, 4) . randomStr(6),
        ]);
    }
}
