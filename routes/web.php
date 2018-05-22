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

Route::group(['middleware' => 'locale'], function () {
    
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'GuestController@index')->name('indexHome');
    Route::get('/product/{product}', 'GuestController@show')->name('productdetail');
    Route::get('checkout', 'GuestController@checkout');
    Route::get('category/{id}', 'GuestController@getProductList')->name('category');
    Route::post('/category/{id}', 'GuestController@getProductsOfCategory');
    Route::post('category/product-list/{string}', 'GuestController@getProductListSort');
    Route::group(
        ['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'checkAdminLogin'],
        function () {
            Route::get('/', 'AdminController@index');
        //Admin user
            Route::resource('user', 'UserController');
            Route::post('raise-admin/{id}', 'UserController@raiseAdmin')->name('raiseAdmin');
            Route::post('reduce-user/{id}', 'UserController@reduceUser')->name('reduceUser');
        //Order admin
            Route::get('order', 'OrderController@index')->name('order');
            Route::get('orderdetail/{id}', 'OrderController@show')->name('orderDetail');
            Route::delete('order/{id}', 'OrderController@destroy')->name('destroyOrder');
            Route::post('order/status/{status}/{id}', 'OrderController@changeStatus')->name('changeStatus');
        //Discount admin
            Route::resource('discount', 'DiscountController');
            Route::resource('category', 'CategoryController');
            Route::resource('supplier', 'SupplierController');
            Route::resource('product', 'ProductController');
        }
    );

    Auth::routes();

    Route::group(['middleware' => 'checkAccessProfile', 'prefix' => 'user', 'namespace' => 'User\Profile'], function () {
        //User Profile
        Route::resource('profile', 'ProfileController');
        Route::get('changePassword', 'ProfileController@indexChangePassword')->name('changePass');
        Route::post('changePassword', 'ProfileController@storeChangePassword')->name('storePass');
        Route::get('userorder', 'OrderController@index')->name('indexOrderUser');
        Route::post('orderDetail/{id}', 'OrderController@getOrderDetail')->name('orderDetailUser');
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
        Route::get('product/{product}', 'ProductController@show')->name('show_pdetail');
        Route::post('review', 'CommentController@store')->name('review');
    });

    Route::namespace('User')->group(function () {
        Route::get('myorder', 'OrderController@create')->name('createOrder');
        Route::post('myorder', 'OrderController@store')->name('orderStore');
    });
});
