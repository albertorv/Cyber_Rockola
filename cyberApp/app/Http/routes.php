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

/*
Route::get('artists','ArtistsController@index');

Route::get('artists/create','ArtistsController@create');

Route::post('artists','ArtistsController@store');

Route::get('artists/{id}','ArtistsController@show');

*/
Route::resource('artists', 'ArtistsController');
Route::resource('tracks', 'TracksController');

Route::post('apply/upload', 'TracksController@store');

/*
Route::get('tracks','TracksController@index');

Route::get('tracks/create','TracksController@create');

Route::post('tracks','TracksController@store');

Route::get('tracks/{id}','TracksController@show');

Route::match(['get', 'post'],'tracks/{id}/edit', [
    'uses' =>'TracksController@edit']);
*/
/**Route::match(['get','post'],'articles/{id}/edit',
	'uses' =>'ArticlesController@edit']);**/
