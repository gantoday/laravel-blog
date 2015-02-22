<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->composeNavgation();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	private function composeNavgation()
	{
		view()->composer('home.partials.sidebar',function($view){
			$allTags=\App\Tag::all();
			$NewestArticles=\App\Article::latest()->take(15)->get();
			$hottestArticles=\App\Article::orderBy('click')->take(15)->get();
			$view->with(compact('allTags','NewestArticles','hottestArticles'));
		});
	}
}
