<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRoleApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sys_role_apis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigInteger('role_id')->default(0)->comment("角色ID");
            $table->bigInteger('api_id')->default(0)->comment("请求接口ID");
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->comment('删除时间 null未删除');
            $table->index('role_id');
            $table->index('api_id');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_role_apis` comment '系统—角色请求接口关联表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_role_apis');
    }
}
