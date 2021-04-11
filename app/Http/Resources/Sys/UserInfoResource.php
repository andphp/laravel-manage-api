<?php

namespace App\Http\Resources\Sys;


use App\Traits\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
{

    use SuccessResource;

    protected $roleIDs;

    public function __construct($resource,$roleIDs)
    {
        parent::__construct($resource);
        $this->roleIDs = $roleIDs;
    }

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
                'username'          => $this->username,
                'nickname'          => $this->nickname,
                'avatar'            => $this->avatar,
                'role_id'           => $this->roleIDs
            ];
    }

}
