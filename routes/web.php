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

Route::get('/home', 'HomeController@index')->name('home');

//Auth
Auth::routes();

//Auth via social account
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('auth.social');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//User router
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    //show profile and update
    Route::get('profile', 'User\HomeController@show')->name('user.show');
    Route::post('profile', 'User\HomeController@update');

    //Change password
    Route::get('password', 'User\HomeController@showFormPassword')->name('user.password');
    Route::post('password', 'User\HomeController@changePassword');

    //Order
    Route::resource('order', 'OrderController', ['except' => ['edit', 'update', 'create']]);
});

//Route suggest
Route::get('suggest', ['middleware' => 'auth', 'uses' => 'SuggestController@create'])->name('suggest');
Route::post('suggest', ['middleware' => 'auth', 'uses' => 'SuggestController@store']);

//Admin router
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    //Route manager user
    Route::resource('user', 'UserController', ['except' => 'show']);

    //Route manager category
    Route::resource('category', 'CategoryController', ['except' => 'show']);

    //Route manager suggest
    Route::resource('suggest', 'SuggestController', ['except' => ['create', 'store']]);

    //Route manager product
    Route::resource('product', 'ProductController', ['except' => 'show']);

    //Route manager order
    Route::resource('order', 'OrderController', ['except' => ['create', 'store', 'edit']]);
});

//Product route
Route::get('product/{id}', 'ProductController@show');

//Product category
Route::get('category/{id}', 'ProductController@showProductByCategory');

//Rating route
Route::post('rate', 'RateController@update');

//Cart route
Route::resource('cart', 'CartController');
Route::post('cart/remove', 'CartController@remove');

//Filter route
Route::get('filter', 'FilterController@index');
