<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiDocsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_docs_records', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('action')->default(1)->comment("操作类型：1创建，2更新，3删除");
            $table->string('operator')->default("")->comment("操作人");
            $table->string('url')->default("")->comment("接口路径");
            $table->string('title')->default("")->comment("接口名称");
            $table->string('method')->default("")->comment("请求方式");
            $table->string('header')->default("")->comment("header参数");
            $table->string('query')->default("")->comment("query参数");
            $table->string('body')->default("")->comment("body参数");
            $table->string('description')->default("")->comment("描述");
            $table->string('response')->default("")->comment("返回数据");
            $table->dateTime('created_at')->nullable()->comment("创建时间");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_docs_records');
    }
}
