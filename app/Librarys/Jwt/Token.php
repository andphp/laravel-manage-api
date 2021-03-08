<?php


namespace App\Librarys\Jwt;


use App\Exceptions\ApiException;
use  \Firebase\JWT\JWT;

class Token
{
    protected $key;
    protected $token_config;
    protected $access_token;
    protected $refresh_token;

    private static $instance = null;

    private function __construct()
    {
        $this->key = config('jwt.secret');
        $this->token_config = array_merge(config('jwt.token'), [
            'iat' => time(),    // jwt的签发时间
            'nbf' => time()     // 定义在什么时间之前，某个时间点后才能访问
        ]);
        $this->access_token = array_merge($this->token_config, [
            'scopes' => 'access_token',
            'exp'    => time() + config('jwt.ttl', 60)
        ]);
        $this->refresh_token = array_merge($this->token_config, [
            'scopes' => 'refresh_token',
            'exp'    => time() + config('jwt.refresh_ttl', 60)
        ]);
    }

    /**
     * 单例模式运行
     * @return Token|null
     */
    public static function make()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 构建
     * @param array $data
     * @return array
     */
    public function generateToken(array $data)
    {

        //公用信息
        $token['data'] = $data;
        $access_token = array_merge($this->access_token, $token);
        $refresh_token = array_merge($this->refresh_token, $token);
        return [
            'access_token'  => JWT::encode($access_token, $this->key),
            'refresh_token' => JWT::encode($refresh_token, $this->key)
        ];
    }

    /**
     * 验证
     * @param $jwt
     * @return array
     * @throws \Exception
     */
    public function verification($jwt)
    {
        try {
            JWT::$leeway = 60;//当前时间减去60，把时间留点余地
            $decoded = JWT::decode($jwt, $this->key, ['HS256']); //HS256方式，这里要和签发的时候对应
            return (array)$decoded;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {  //签名不正确
            throw new ApiException(['msg' => $e->getMessage()]);
        } catch (\Firebase\JWT\BeforeValidException $e) {  // 签名在某个时间点之后才能用
            throw new ApiException(['msg' => $e->getMessage()]);
        } catch (\Firebase\JWT\ExpiredException $e) {  // token过期
            throw new ApiException(['code' => 503, 'msg' => $e->getMessage()]);
        } catch (\Exception $e) {  //其他错误
            throw new ApiException(['msg' => $e->getMessage()]);
        }
    }

    /**
     * 刷新
     * @param $jwt
     * @return array
     * @throws \Exception
     */
    public function refreshToken($jwt)
    {
        $data = $this->verification($jwt);
        return $this->generateToken((array)$data['data']);
    }

    public function setSecret($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getAccessTokenExp()
    {
        return $this->access_token['exp'];
    }

    public function getRefreshTokenExp()
    {
        return $this->refresh_token['exp'];
    }
}
