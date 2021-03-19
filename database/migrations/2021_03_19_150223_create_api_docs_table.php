<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_docs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('creator')->default("")->comment("创建人");
            $table->string('title')->default("")->comment("接口名称");
            $table->string('method')->default("")->comment("请求方式");
            $table->string('header')->default("")->comment("header参数");
            $table->string('query')->default("")->comment("query参数");
            $table->string('body')->default("")->comment("body参数");
            $table->string('url')->default("")->comment("接口路径");
            $table->string('description')->default("")->comment("描述");
            $table->string('response')->default("")->comment("返回数据");
            $table->string('editor')->default("")->comment("更新人");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_docs');
    }
}
