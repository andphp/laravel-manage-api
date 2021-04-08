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
Route::get('/test', [\App\Http\Controllers\TestController::class,'index']);
Route::namespace('V1')->prefix('v1/')->middleware('cors')->group( function () {
    Route::post('sign_in', [\App\Http\Controllers\V1\AuthController::class,'signIn']); // 提交登录

    /**
     * 登录验证路由:
     */
    Route::middleware('auth:admin')->group( function () {
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
