<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_apis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('path')->default("")->comment("api路径");
            $table->string('description')->default("")->comment("api中文描述");
            $table->string('api_group')->default("")->comment("api组");
            $table->string('method')->default("POST")->comment("请求方式");
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->comment('删除时间 null未删除');
            $table->index('path');
            $table->index('api_group');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_apis` comment '系统—请求接口表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_apis');
    }
}
