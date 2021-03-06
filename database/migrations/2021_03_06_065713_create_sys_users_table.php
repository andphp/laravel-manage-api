<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('uuid')->unique()->comment("用户UUID");
            $table->string('email')->unique()->comment("邮箱");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->default("")->comment("用户登录名");
            $table->string('nickname')->default("")->comment("昵称");
            $table->string('realname')->default("")->comment("实名");
            $table->string('password')->default("")->comment("密码");
            $table->string('avatar')->default("")->comment("头像");
            $table->integer('role_id')->default(1)->comment("角色ID");
            $table->timestamp('last_login_at',0)->nullable()->comment('最后登录日期');
            $table->string('last_ip')->default('')->comment('最后登录IP');
            $table->tinyInteger('status')->default(1)->comment('状态: 1=启用 2=禁用');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_users` comment '系统用户表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users');
    }
}
