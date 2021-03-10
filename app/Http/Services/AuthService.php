<?php

namespace App\Http\Services;


use App\Constant\Error;
use App\Exceptions\ApiException;
use App\Librarys\Jwt\Token;
use App\Models\SysUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public static function __callStatic($method, $parameters):array
    {

        //注意这里，通过延迟静态绑定，仍然new了一个实例
        $return =  (new static)->{$method}(...$parameters);
        if(is_array($return) && isset($return['err'])){
            $result[0] = $return['data'];
            $result[1] = $return['err'];
        }else{
            $result[0] = $return;
            $result[1] = null;
        }
        return $result;
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
            ['phone','=',$account],
            ['email','=',$account,'or'],
        ];

        // 验证用户
        $user = SysUser::query()->where($where)->first();
        if(!$user){
            return $this->error(Error::NOT_USER_EXISTS);
        }

        // 验证密码
        if(!Hash::check($password,$user->password)){
            return $this->error(Error::PASSWORD_ERROR);
        }

        // 组装token数据
        $authData = [
            'uid' => $user->id,
            'uuid' => $user->uuid,
            'email' => $user->email,
            'phone' => $user->phone,
            'username' => $user->username,
            'nickname' => $user->nickname,
            'realname' => $user->realname,
            'role_id' => $user->role_id,
        ];

        $user->token = Token::make()->generateToken($authData);

        return $user;
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
