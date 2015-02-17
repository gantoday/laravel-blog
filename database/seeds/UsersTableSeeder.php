<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		User::create([
			'username' => 'admin',
            'email' => 'ganto@qq.com',
            'password' => Hash::make('123456'),
            'admin' => '1'
		]);

		User::create([
			'username' => 'editor',
            'email' => 'ganti@qq.com',
            'password' => Hash::make('123456'),
            'admin' => '0'
		]);

	}

}