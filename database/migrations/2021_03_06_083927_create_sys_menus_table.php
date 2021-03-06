<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('menu_level')->default(0)->comment("菜单等级");
            $table->bigInteger('parent_id')->default(0)->comment("父菜单ID");
            $table->string('path')->default("")->comment("路由path");
            $table->string('name')->default("")->comment("路由name");
            $table->boolean('hidden')->default(false)->comment("是否在列表隐藏");
            $table->string('component')->default("")->comment("对应前端文件路径");
            $table->integer('sort')->default(99)->comment("排序标记");
            $table->boolean('keep_alive')->default(false)->comment("附加属性:");
            $table->boolean('default_menu')->default(false)->comment("附加属性:");
            $table->string('title')->default("")->comment("附加属性:标题");
            $table->string('icon')->default("")->comment("附加属性:icon");
            $table->boolean('close_tab')->default(false)->comment("附加属性:");
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->comment('删除时间 null未删除');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_menus` comment '系统—菜单表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_menus');
    }
}
