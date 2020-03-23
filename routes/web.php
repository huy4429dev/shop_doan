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
        Route::get('/', 'Admin\users\usersController@index')->name('admin.users.index');
        Route::get('goadd', 'Admin\users\usersController@goadd')->name('admin.users.goadd');
        Route::post('add', 'Admin\users\usersController@add')->name('admin.users.add');
        Route::get('goedit/{id}', 'Admin\users\usersController@goedit')->name('admin.users.goedit');
        Route::post('edit/{id}', 'Admin\users\usersController@edit')->name('admin.users.edit');
        Route::get('delete/{id}', 'Admin\users\usersController@delete')->name('admin.users.delete');
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

        Route::get('index', 'Admin\Product\ProductController@index')->name('admin.product.index');
        Route::post('add', 'Admin\Product\ProductController@add')->name('admin.product.add');
        Route::post('edit', 'Admin\Product\ProductController@edit')->name('admin.product.edit');
        Route::get('delete', 'Admin\Product\ProductController@delete')->name('admin.product.delete');  
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