<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysOperationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_operation_records', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('ip')->default("")->comment("请求ip");
            $table->string('method')->default("")->comment("请求方法");
            $table->string('path')->default("")->comment("请求路径");
            $table->integer('status')->default(0)->comment("请求状态");
            $table->integer('latency')->default(0)->comment("延迟");
            $table->string('agent')->default("")->comment("代理");
            $table->string('error_message')->default("")->comment("错误信息");
            $table->longText('request_body')->nullable()->comment("请求Body");
            $table->longText('response_body')->nullable()->comment("响应Body");
            $table->bigInteger('user_id')->default(0)->comment("用户ID");
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->comment('删除时间 null未删除');
            $table->index('ip');
            $table->index('path');
            $table->index('status');
            $table->index('user_id');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_operation_records` comment '系统—运行记录表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_operation_records');
    }
}
