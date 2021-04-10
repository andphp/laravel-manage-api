<?php

namespace App\Http\Controllers;

use AndPHP\OutPut\OutPut;
use App\Constant\Error;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, OutPut;

    /**
     * 当前页码
     * @var int
     */
    public $page;

    /**ØØ
     * 查询条数，分页大小
     * @var int
     */
    public $limit;

    public function __construct()
    {
        $this->page = abs(request()->input('page', 1));            //页码
        $this->limit = abs(request()->input('size', 10));;        //分页大小
    }

}
