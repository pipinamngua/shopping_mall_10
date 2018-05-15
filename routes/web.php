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
    return view('layouts.user.layout');
});
Route::get('/admin', function () {
    return view('layouts.admin.layout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //Admin user
    Route::resource('user', 'UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> 'auth', 'prefix' => 'user', 'namespace' => 'User\Profile'], function () {
    //User Profile
    Route::resource('profile', 'ProfileController');
    Route::get('changePassword', 'ProfileController@indexChangePassword')->name('changePass');
    Route::post('changePassword', 'ProfileController@storeChangePassword')->name('storePass');
});

//Cart
Route::namespace('User')->group(function () {
    Route::get('cart', 'CartController@index')->name('cart');
    Route::post('cart', 'CartController@store')->name('storeCart');
    Route::get('product', 'CartController@show')->name('showProduct');
    Route::post('increment/{id}', 'CartController@incrementQty')->name('incrementQty');
    Route::post('decrement/{id}', 'CartController@decrementQty')->name('decrementQty');
    Route::post('destroyItem', 'CartController@destroy')->name('destroyItemCart');
    Route::get('destroyCart', 'CartController@destroyCart')->name('destroyCart');
});
