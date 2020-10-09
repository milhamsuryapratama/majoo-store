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
    });
});

Route::get('/', 'Web\ProductController@index');

Route::group(['namespace' => 'Web'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/{slug}', 'ProductController@detail');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@index')->name('cart');
        Route::post('/', 'CartController@store');
        Route::get('/delete/{id}', 'CartController@delete');
        Route::post('/change_qty', 'CartController@change_qty');
    });

    Route::group(['prefix' => 'checkout'], function () {
        Route::post('/', 'CheckoutController@index')->name('checkout');
        Route::post('/store', 'CheckoutController@store');
    });
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
