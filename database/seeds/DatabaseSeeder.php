<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

		\App\User::create([
			'username' => 'ganto',
			'email' => 'ganto@qq.com',
			'password' => Hash::make('123456')
		]);

		\App\Tag::create([
			'name' => 'tag1'
		]);

		\App\Tag::create([
			'name' => 'tag2'
		]);
	
		\App\Tag::create([
			'name' => 'tag3'
		]);

		\App\Category::create([
			'name' => 'work'
		]);

		\App\Category::create([
			'name' => 'family'
		]);

		\App\Category::create([
			'name' => 'local'
		]);

		\App\Article::create([
			'user_id' => '1',
			'category_id' => '2',
			'title' => 'Article title one',
			'body' => 'article body one article body one article body one article body one article body one article body one article body one article body one article body one article body one article body one article body one article body one article body one '
		]);

		\App\Article::create([
			'user_id' => '1',
			'category_id' => '3',
			'title' => 'Article title two',
			'body' => 'article body two article body two article body two article body two article body two article body two article body two article body two article body two article body two article body two article body two article body two article body two '
		]);

		\App\Article::create([
			'user_id' => '1',
			'category_id' => '1',
			'title' => 'Article title three',
			'body' => 'article body three article body three article body three article body three article body three article body three article body three article body three article body three article body three article body three article body three article body three'
		]);

		\App\ArticleTag::create([
			'article_id' => '1',
			'tag_id' => 1,
		]);

		\App\ArticleTag::create([
			'article_id' => '1',
			'tag_id' => 3,
		]);

		\App\ArticleTag::create([
			'article_id' => '2',
			'tag_id' => 2,
		]);

		\App\ArticleTag::create([
			'article_id' => '2',
			'tag_id' => 3,
		]);

		\App\ArticleTag::create([
			'article_id' => '3',
			'tag_id' => 1,
		]);

		\App\ArticleTag::create([
			'article_id' => '3',
			'tag_id' => 2,
		]);

		\App\ArticleTag::create([
			'article_id' => '3',
			'tag_id' => 3,
		]);

	}

}
