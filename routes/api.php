<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'V1',
    'prefix' => 'v1/',
], function () {
    Route::post('sign_in', [\App\Http\Controllers\V1\AuthController::class,'signIn']); // 提交登录

    /**
     * 登录验证路由:
     */
    Route::group(['middleware' => App\Http\Middleware\Authenticate::class], function () {
        /**
         * |--------------------------------------------------------------------------
         * | 角色 相关的路由
         * |--------------------------------------------------------------------------
         */
        Route::group(['prefix' => 'role'], function () {
            Route::post('list', [\App\Http\Controllers\V1\RoleController::class,'list']); // 获取 角色列表
            Route::post('create', [\App\Http\Controllers\V1\RoleController::class,'create']); // 创建 角色
        });
    });
});
