<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class SysUserInfo extends JsonResource
{


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
                'role_id'           => 444
            ];
    }

}
