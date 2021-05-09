<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SysUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_users')->insert([
            'uuid'       => Str::uuid(),
            'username'   => 'admin',
            'nickname'   => 'admin_nick',
            'phone'      => '1' . (string)mt_rand(1000000000, 9999999999),
            'email'      => Str::random(10) . '@qq.com',
            'password'   => Hash::make('123456'),
            'avatar'     => 'https://i.gtimg.cn/club/item/face/img/2/16022_100.gif',
            'created_at' => now(),
        ]);
    }
}
