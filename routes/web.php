<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth
Auth::routes();

//Auth via social account
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('auth.social');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

//User router
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    //show profile and update
    Route::get('profile', 'User\HomeController@show')->name('user.show');
    Route::post('profile', 'User\HomeController@update');

    //Change password
    Route::get('password', 'User\HomeController@showFormPassword')->name('user.password');
    Route::post('password', 'User\HomeController@changePassword');
});

//Admin router
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    //Route manager user
    Route::resource('user', 'UserController', ['as' => 'admin', 'except' => 'show']);
});
