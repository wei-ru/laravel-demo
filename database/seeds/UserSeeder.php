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
        factory(\App\User::class, 100)->create();
        $user = \App\User::find(1);
        $user->name = 'James Yu';
        $user->email = 'asd@cc.cc';
        $user->password = bcrypt('asdfq');
        $user->is_admin = 1;
        $user->save();
        $user = \App\User::find(2);
        $user->name = 'Harper Hsu';
        $user->email = 'qwe@cc.cc';
        $user->password = bcrypt('asdfq');
        $user->save();
    }
}
