<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRoleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_role_menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigInteger('role_id')->default(0)->comment("角色ID");
            $table->bigInteger('menu_id')->default(0)->comment("菜单ID");
            $table->string('ability')->default("")->comment('权限：序列化["READ","WRITE","DELETE"]');
            $table->index('role_id');
            $table->index('menu_id');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_role_menus` comment '系统—角色菜单关联表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_role_menus');
    }
}
