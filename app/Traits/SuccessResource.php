<?php


namespace App\Traits;


use App\Constant\Status;
use Illuminate\Container\Container;
use Illuminate\Contracts\Support\Arrayable;

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
            "code" => Status::SUCCESS,
            "msg"  => "success",
        ];
    }

    /**
     * Resolve the resource to an array.
     *
     * @param  \Illuminate\Http\Request|null  $request
     * @return array
     */
    public function resolve($request = null)
    {
        $data = $this->toArray(
            $request = $request ?: Container::getInstance()->make('request')
        );

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        } elseif ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        return $this->filter((array) camelCase($data));
    }
}
