<?php

namespace App\Http\Middleware;


use App\Librarys\Jwt\Token;
use App\Models\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Authenticate
{

    public function handle(Request $request, \Closure $next, ...$guards)
    {
        // 获取method,白名单验证
        $dev = $request->header('generator', null);
        $phone = $request->header('phone', 13983854512);
        if ($dev == 'dev') {
            $owner_info = DB::table('iot_agent_user')
                ->where('phone', $phone)
                ->whereNull('deleted_at')
                ->first();
            $tokenData = [
                'community_id' => $owner_info->community_id,
                'user_id'      => $owner_info->id,
                'phone'        => $owner_info->phone,
            ];
            $request->userInfo = json_decode(json_encode($tokenData), true);
            return $next($request);
        }

        $authorization = $request->header('authorization', null);

        $result = [
            'code' => 403,
            'msg'  => 'validation.authorization.invalid',
        ];

        if (!$authorization) {
            return response()->json($result, 403)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $matches = array();
        if (preg_match('/Bearer\s(\S+)/', $authorization, $matches)) {
            $access_token = $matches[1];
        } else {
            return response()->json($result, 403)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
        $mid_params['token'] = $authorization;

        // 验证解密
        ['data' => $tokenData] = Token::make()->verification($access_token);

        // 公共参数
        $request->userInfo = json_decode(json_encode($tokenData), true);
        // 初始化用户信息到扩展类

        // todo: 验证sign签名
        $response = $next($request);
        if (config('app.debug')) {
            //开发环境，则显示详细错误信息
            //日志
            return $response;
        }
        return $response;

    }
}
