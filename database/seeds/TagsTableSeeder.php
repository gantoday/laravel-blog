<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('zh_CN');

        foreach (range(1, 20) as $index) {
            \App\Tag::create([
                'name' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
