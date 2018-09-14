<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //用户表插入数据

//        \App\User::create([
//           'name'=>'little pod',
//           'email'=>'123@qq.com',
//           'password'=>bcrypt('admin888')
//        ]);

        factory(\App\User::class,100)->create();
        $user = \App\User::find(1);
        $user->name = '程旭远';
        $user->email = 'gao@126.com';
        $user->password = bcrypt('admin888');
        $user->save();
    }
}
