<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_departments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('department_name')->default("")->comment("部门名称");
            $table->string('parent_id')->default(0)->comment("父级部门ID(不继承角色权限)");
            $table->string('role_ids')->default('')->comment("部门拥有的角色权限ID【逗号分隔】,部门公共角色权限");
            $table->timestamps();
            $table->index('department_name');
            $table->index('parent_id');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `sys_departments` comment '系统—部门表'");//表注释一定加上前缀
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_departments');
    }
}
