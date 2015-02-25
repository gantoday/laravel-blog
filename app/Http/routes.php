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
 * admin
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'before' => 'auth'], function()
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
    
    Route::post('uploadImage', 'ArticlesController@uploadImage');
});


/**
 * auth
 */
Route::get('login','Admin\AuthController@getLogin');
Route::post('login','Admin\AuthController@postLogin');
Route::get('logout','Admin\AuthController@logout');


/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/


Route::get('foo',function(){
    $name = 'BBB';
    $alias = 'BBB';
    $tag = \App\Tag::firstOrCreate(compact('name','alias'));
    return $tag;
});

Route::get('bar',function(){

    return view('aaa');

});


/**
 * home
 */
Route::group(['namespace' => 'Home'], function()
{

    Route::resource('/','HomeController@index');

    Route::get('tags', 'TagsController@index');
    Route::get('tags/{slug}', 'TagsController@show');

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/{slug}', 'CategoriesController@show');

    Route::get('articles', 'ArticlesController@index');
    Route::get('{slug}', 'ArticlesController@show');
});

