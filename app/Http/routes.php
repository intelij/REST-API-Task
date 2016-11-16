<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

// Registration Routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});

// Password Reset Routes...

Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::resource("goustos", "GoustoController");

Route::get('goustos/delete/{id}', [
    'as' => 'goustos.delete',
    'uses' => 'GoustoController@destroy',
]);


Route::resource("goustos", "GoustoController");

Route::get('goustos/delete/{id}', [
    'as' => 'goustos.delete',
    'uses' => 'GoustoController@destroy',
]);


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require config('infyom.laravel_generator.path.api_routes');
	});
});


Route::resource("goustos", "GoustoController");

Route::get('goustos/delete/{id}', [
    'as' => 'goustos.delete',
    'uses' => 'GoustoController@destroy',
]);


Route::resource("goustos", "GoustoController");

Route::get('goustos/delete/{id}', [
    'as' => 'goustos.delete',
    'uses' => 'GoustoController@destroy',
]);
