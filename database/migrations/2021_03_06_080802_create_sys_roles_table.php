<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('role_name')->default("")->comment("角色名");
            $table->string('parent_id')->default(0)->comment("父角色ID");
            $table->string('default_router')->default("dashboard")->comment("默认菜单");
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_roles` comment '系统—角色表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_roles');
    }
}
