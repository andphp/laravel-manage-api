<?php


namespace App\Traits;


use App\Constant\Status;

trait SuccessResource
{
    /**
     * 返回应该和资源一起返回的其他数据数组
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            "code"    => Status::SUCCESS,
            "message" => "success",
        ];
    }

}
