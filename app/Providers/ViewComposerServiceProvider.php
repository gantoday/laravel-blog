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
		$this->composeSidebar();
		$this->composeSettings();
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

	private function composeSidebar()
	{
		view()->composer('home.partials.sidebar',function($view){
			$allTags=\App\Tag::all();
			$NewestArticles=\App\Article::latest()->take(15)->get();
			$hottestArticles=\App\Article::orderBy('click')->take(15)->get();
			$view->with(compact('allTags','NewestArticles','hottestArticles'));
		});
	}

	private function composeSettings()
	{
		view()->composer('*',function($view){
			$settings=\App\Setting::getSettingsArr();
			$view->with(compact('settings'));

		});
	}
}
