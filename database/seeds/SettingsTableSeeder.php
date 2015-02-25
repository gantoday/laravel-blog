<?php

use \App\Setting;

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		Setting::create([
			'name' => 'site_name',
			'value' => '林大帅的博客',
			'description' => '站点标题',
			'type' => 'text'
		]);

		Setting::create([
			'name' => 'site_description',
			'value' => 'Designing && Developing',
			'description' => '站点描述',
			'type' => 'text'
		]);

		Setting::create([
			'name' => 'site_url',
			'value' => 'http://www.90door.com/',
			'description' => '站点网址',
			'type' => 'text'
		]);

		Setting::create([
			'name' => 'cdn_domain',
			'value' => 'http://source.90door.com',
			'description' => '七牛cdn加速域名',
			'type' => 'text'
		]);

		Setting::create([
			'name' => 'cdn_on',
			'value' => 'false',
			'description' => '七牛cdn加速开关,true or false',
			'type' => 'text'
		]);

		Setting::create([
			'name' => 'pagination',
			'value' => '8',
			'description' => '博文列表每页显示博文数量',
			'type' => 'text'
		]);
		
		Setting::create([
			'name' => 'expire',
			'value' => '1',
			'description' => '缓存过期时间',
			'type' => 'text'
		]);

	}

}