<?php

// Composer: "fzaninotto/faker": "~1.4.0"
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$userIds = \App\User::lists('id');
		$tagIds = \App\Tag::lists('id');
		$categoryIds = \App\Category::lists('id');

		foreach(range(1, 100) as $index)
		{
			\App\Article::create([
				'title' => $faker->name,
                'body' => $faker->paragraph(10),
				'click' => $faker->numberBetween($min = 100, $max = 9000),
				'slug' => 'this-is-article-slug-'.$index,
				'category_id' => $faker->randomElement($categoryIds),
				'user_id' => $faker->randomElement($userIds),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
			]);

			\App\ArticleTagPrivot::create([
				'article_id' => $index+3,
				'tag_id' => $faker->randomElement($tagIds),
			]);

		}
	}

}