<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sys;
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
Route::prefix('sys/')->middleware('cors')->group( function () {
    Route::post('sign_in', [Sys\AuthController::class, 'signIn']); // 提交登录

    Route::middleware(['jwt.role:admin', 'jwt.auth'])->group(function() {
        //当前用户信息
        Route::post('user/info', [Sys\AuthController::class, 'info']);
        Route::post('reset_password', 'AuthController@resetPassword')->name('auth.reset_password');
        //用户退出
        Route::post('sign_out', 'AuthController@signOut')->name('auth.signOut');
    });

    /**
     * 登录验证路由:
     */
    Route::middleware('auth.admin')->group( function () {
        /**
         * |--------------------------------------------------------------------------
         * | 角色 相关的路由
         * |--------------------------------------------------------------------------
         */
        Route::group(['prefix' => 'role'], function () {
            Route::post('list', [\App\Http\Controllers\Sys\RoleController::class,'list']); // 获取 角色列表
            Route::post('create', [\App\Http\Controllers\Sys\RoleController::class,'create']); // 创建 角色
        });
    });
});
