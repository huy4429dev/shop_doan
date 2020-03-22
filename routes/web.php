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
    Route::get('product','Admin\Product\ProductController@index');
});

/**
 * Home page
 * 
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin //  User
 */
Route::get('/admin/users/index', 'Admin\users\usersController@index')->name('admin.users.index');
Route::post('/admin/users/add', 'Admin\users\usersController@add')->name('admin.users.add');
Route::post('/admin/users/edit', 'Admin\users\usersController@edit')->name('admin.users.edit');
Route::get('/admin/users/delete', 'Admin\users\usersController@delete')->name('admin.users.delete');


/**
 * Admin // Tin tức
 */

Route::get('/admin/news/index', 'Admin\news\newsController@index')->name('admin.news.index');
Route::post('/admin/news/add', 'Admin\news\newsController@add')->name('admin.news.add');
Route::post('/admin/news/edit', 'Admin\news\newsController@edit')->name('admin.news.edit');
Route::get('/admin/news/delete', 'Admin\news\newsController@delete')->name('admin.news.delete');

/**
 * Admin // Product
 */

Route::get('/admin/product/index', 'Admin\Product\ProductController@index')->name('admin.product.index');
Route::post('/admin/product/add', 'Admin\Product\ProductController@add')->name('admin.product.add');
Route::post('/admin/product/edit', 'Admin\Product\ProductController@edit')->name('admin.product.edit');
Route::get('/admin/product/delete', 'Admin\Product\ProductController@delete')->name('admin.product.delete');