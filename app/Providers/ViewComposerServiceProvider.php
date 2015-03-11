<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->composeSidebar();
        //$this->composeSettings();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    private function composeSidebar()
    {
        view()->composer('home.partials.sidebar', function ($view) {

            $allTags = \App\Tag::all();
            $allCategories = \App\Category::getSortedCategories();
            $NewestArticles = \App\Article::latest()->take(15)->get();
            $hottestArticles = \App\Article::orderBy('click')->take(15)->get();

            $view->with(compact('allTags', 'allCategories', 'NewestArticles', 'hottestArticles'));
        });
    }

    //暂时不用,改成使用helpers获取设置值
    /*private function composeSettings()
    {
        view()->composer('*',function($view){
            $settings=\App\Setting::getSettingsArr();
            $view->with(compact('settings'));

        });
    }*/
}
