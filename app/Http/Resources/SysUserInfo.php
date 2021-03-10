<?php

namespace App\Http\Resources;

use App\Constant\Status;
use App\Traits\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SysUserInfo extends JsonResource
{
    use SuccessResource;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'uuid'              => $this->uuid,
                'email'             => $this->email,
                'phone'             => $this->phone,
                'email_verified_at' => $this->email_verified_at,
                'username'          => $this->username,
                'nickname'          => $this->nickname,
                'realname'          => $this->realname,
                'password'          => $this->password,
                'avatar'            => $this->avatar,
                'role_id'           => $this->role_id,
                'last_login_at'     => $this->last_login_at,
                'last_ip'           => $this->last_ip,
                'created_at'        => date_format($this->created_at, 'Y-m-d H:i:s'),
                'updated_at'        => date_format($this->updated_at, 'Y-m-d H:i:s'),
            ] + $this->token;
    }

}
