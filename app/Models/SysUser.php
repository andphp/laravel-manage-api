<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use DateTimeInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * Class SysUser
 * @package App\Models
 * @property int id
 * @property string uuid	用户UUID
 * @property string email	邮箱
 * @property string phone	手机号
 * @property datetime email_verified_at	邮箱验证时间
 * @property string username	用户登录名
 * @property string nickname	昵称
 * @property string realname	实名
 * @property string password	密码
 * @property string avatar	头像
 * @property datetime last_login_at	最后登录日期
 * @property string last_ip	最后登录IP
 * @property int status	状态: 1=启用 0=禁用
 * @property datetime created_at
 * @property datetime updated_at
 * @property datetime deleted_at	删除时间 null未删除
 */
class SysUser extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable,SoftDeletes;
    protected $table = 'sys_users';

    protected $fillable = [
        'uuid',
        'email',
        'phone',
        'email_verified_at',
        'username',
        'nickname',
        'realname',
        'password',
        'avatar',
        'last_login_at',
        'last_token',
        'last_ip',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    public function getUserInfo($id)
    {
        return self::find($id);
    }

    //实现 JWTSubject接口  两个函数
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return ['role' => 'admin'];
    }

    /**
     * Prepare a date for array / JSON serialization.
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    public function roles(){
       return $this->belongsToMany('App\Models\SysRole','sys_user_roles','user_id', 'role_id');
    }
}
