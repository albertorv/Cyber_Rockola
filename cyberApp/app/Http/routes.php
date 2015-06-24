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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('home', function () {
    return view('dashboard');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('artists','ArtistsController@index');

Route::get('artists/create','ArtistsController@create');

Route::post('artists','ArtistsController@store');

Route::get('artists/{id}','ArtistsController@show');

/**Route::match(['get','post'],'articles/{id}/edit',
	'uses' =>'ArticlesController@edit']);**/
