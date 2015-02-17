<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * home
 */
Route::group(['namespace' => 'Home'], function()
{
    Route::get('/', function(){
    	return 'Home Page';
    });

    Route::resource('articles','ArticlesController');

    Route::post('uploadImage', 'ArticlesController@uploadImage');
    /*Route::get('articles/create','ArticleController@create');
    Route::get('articles/{id}', 'ArticleController@show');
    Route::post('articles','ArticleController@store');
    Route::get('articles/{id}/edit','ArticleController@edit');
    */
});


/**
 * admin
 */
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function()
{
    Route::get('index','AdminController@index');

    Route::get('articles/index','ArticlesController@index');
    Route::get('articles/trash','ArticlesController@trash');
    Route::post('articles/restore/{id}','ArticlesController@restore');
    Route::delete('articles/forceDelete/{id}','ArticlesController@forceDelete');
    Route::resource('articles','ArticlesController');

    Route::get('categories/index','CategoriesController@index');
    Route::resource('categories','CategoriesController');

    Route::get('tags/index','TagsController@index');
    Route::resource('tags','TagsController');

    Route::get('setting/index','SettingsController@index');
    Route::patch('setting/index','SettingsController@index');
});



/**
 * others
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('foo',function(){
    $name = 'BBB';
    $alias = 'BBB';
    $tag = \App\Tag::firstOrCreate(compact('name','alias'));
    return $tag;
});

Route::get('bar',function(){


return dd(str_slug('呵呵呵呵'));

});
