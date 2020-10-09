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
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
