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
Route::get('/', function(){
	return 'Home Page';
});

Route::resource('articles','ArticleController');

Route::post('uploadImage', 'ArticleController@uploadImage');
/*Route::get('articles/create','ArticleController@create');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/edit','ArticleController@edit');
*/


/**
 * admin
 */
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function()
{
    Route::get('index','AdminController@index');

    Route::get('articles/index','ArticleController@index');
    Route::get('articles/trash','ArticleController@trash');
    Route::post('articles/restore/{id}','ArticleController@restore');
    Route::delete('articles/forceDelete/{id}','ArticleController@forceDelete');
    Route::resource('articles','ArticleController');
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


return '
<form method="POST" style="float: left;" action="http://blog.app:8000/admin/articles/105/restore" accept-charset="UTF-8"><input name="_token" type="hidden" value="sggC4SeNQFbTNmZWiQLsxsex0m4pckQN5d0cOqPC">
    <button type="submit" class="btn btn-success btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> Restore</button>
</form><form method="POST" style="float: left;" action="http://blog.app:8000/admin/articles/105/foceDelete" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="sggC4SeNQFbTNmZWiQLsxsex0m4pckQN5d0cOqPC">
    <button type="submit" class="btn btn-sm btn-danger iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> Destroy</button>
</form>';

});
