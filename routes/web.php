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

Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/login', 'Admin\LoginController@login');
Route::get('/admin/dashboard', 'Admin\DashboardController@index');
Route::get('/admin/logout', 'Admin\LoginController@logout');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
        Route::resource('products', 'ProductController');

        Route::group(['prefix' => 'transaction'], function () {
            Route::get('/', 'TransactionController@index');
            Route::get('/data/{id}', 'TransactionController@detail');
            Route::post('/delivered/{id}', 'TransactionController@delivered');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'AdminController@index');
            Route::post('/update_password', 'AdminController@update_password');
            Route::post('/update_photo', 'AdminController@update_photo');
        });
    });
});

Route::get('/', 'Web\ProductController@index');

Route::group(['namespace' => 'Web'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/{slug}', 'ProductController@detail');
    });

    Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
        Route::get('/', 'CartController@index')->name('cart');
        Route::post('/', 'CartController@store');
        Route::get('/delete/{id}', 'CartController@delete');
        Route::post('/change_qty', 'CartController@change_qty');
    });

    Route::group(['prefix' => 'checkout', 'middleware' => 'auth'], function () {
        Route::post('/', 'CheckoutController@index')->name('checkout');
        Route::post('/store', 'CheckoutController@store');
    });


    Route::group(['prefix' => 'orders', 'middleware' => 'auth'], function () {
        Route::get('/', 'OrderController@index')->name('orders');
        Route::get('/data/{id}', 'OrderController@detail');
        Route::get('/pay', 'OrderController@pay');
        Route::post('/paid', 'OrderController@paid');
    });
});

Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');
