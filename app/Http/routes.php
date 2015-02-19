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

    Route::resource('/','ArticlesController@index');
    Route::get('articles', 'ArticlesController@index');
    Route::get('articles/{slug}', 'ArticlesController@show');
    Route::post('uploadImage', 'ArticlesController@uploadImage');
    /*Route::get('articles/create','ArticlesController@create');
    Route::get('articles/{id}', 'ArticlesController@show');
    Route::post('articles','ArticlesController@store');
    Route::get('articles/{id}/edit','ArticlesController@edit');
    */
});


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

    $categories = \App\Category::all();
    $result = array();
    foreach ($categories as $key => $category) {
        if ( $category->parent_id == 0 ) {
            $result[$category->name] = array();
            foreach ($categories as $skey => $scategory) {
                if ($scategory->parent_id == $category->id) {
                    $result[$category->name][] = $scategory->name;
                }
            }
        }
    }
    return var_dump($result);

});
