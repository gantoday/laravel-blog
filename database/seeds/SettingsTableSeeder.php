<?php

use \App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'name' => 'site_name',
            'value' => '林大帅的博客',
            'description' => '站点名称',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_description',
            'value' => 'Designing && Developing',
            'description' => '站点描述',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_keywords',
            'value' => '林大帅的博客, 设计, 开发',
            'description' => '站点关键字',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'site_url',
            'value' => 'http://www.90door.com/',
            'description' => '站点网址',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'admin_id',
            'value' => '1',
            'description' => '后台管理员ID',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'bei_an',
            'value' => '闽ICP备15000000号-1',
            'description' => '站点备案号',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'tong_ji',
            'value' => '<script src="http://s6.cnzz.com/stat.php?id=3236483&web_id=3236483" language="JavaScript"></script>',
            'description' => '站点统计代码',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'cdn_domain',
            'value' => 'http://source.90door.com',
            'description' => '七牛cdn加速域名',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'cdn_on',
            'value' => '0',
            'description' => '七牛cdn加速开关,1 or 0',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'page_size',
            'value' => '8',
            'description' => '博文列表每页显示博文数量',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'expire',
            'value' => '1',
            'description' => '缓存过期时间,单位分钟',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'comment_on',
            'value' => '1',
            'description' => '文章评论开关,1 or 0',
            'type' => 'text',
        ]);

        Setting::create([
            'name' => 'register_on',
            'value' => '0',
            'description' => '会员注册开关,1 or 0',
            'type' => 'text',
        ]);
    }
}
