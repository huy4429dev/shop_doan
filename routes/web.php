<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Admin page
 * 
 */

Route::prefix('admin')->group(function () {
    Route::get('/', function(){ return view('home');});
    Route::prefix('users')->group(function () {
        /**
         * Admin //  User
         */
        Route::get('index', 'Admin\users\usersController@index')->name('admin.users.index');
        Route::post('add', 'Admin\users\usersController@add')->name('admin.users.add');
        Route::post('edit', 'Admin\users\usersController@edit')->name('admin.users.edit');
        Route::get('delete', 'Admin\users\usersController@delete')->name('admin.users.delete');
    });

    Route::prefix('news')->group(function () {
        /**
         * Admin // Tin tức
         */

        Route::get('index', 'Admin\news\newsController@index')->name('admin.news.index');
        Route::post('add', 'Admin\news\newsController@add')->name('admin.news.add');
        Route::post('edit', 'Admin\news\newsController@edit')->name('admin.news.edit');
        Route::get('delete', 'Admin\news\newsController@delete')->name('admin.news.delete');
    });
    Route::prefix('product')->group(function () {
        /**
         * Admin // Product
         */

        Route::get('/', 'Admin\Product\ProductController@index')->name('admin.product.index');
        Route::post('/', 'Admin\Product\ProductController@add')->name('admin.product.add');
        Route::get('/{id}/edit', 'Admin\Product\ProductController@edit')->name('admin.product.edit');
        Route::post('/{id}', 'Admin\Product\ProductController@update')->name('admin.product.update');
        Route::get('/{id}', 'Admin\Product\ProductController@delete')->name('admin.product.delete');
    });  
});

/**
 * Home page
 * 
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');