<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'username' => 'ganto',
            'email' => 'ganto@qq.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
