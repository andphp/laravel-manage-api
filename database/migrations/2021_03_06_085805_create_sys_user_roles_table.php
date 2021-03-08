<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_user_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigInteger('user_id')->default(0)->comment("用户ID");
            $table->bigInteger('role_id')->default(0)->comment("角色ID");
            $table->index('user_id');
            $table->index('role_id');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_user_roles` comment '系统—用户角色关联表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_user_roles');
    }
}
