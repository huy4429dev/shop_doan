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
    Route::get('/', function () {
        return view('home');
    });
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

        Route::get('/', 'Admin\news\newsController@index')->name('admin.news.index');
        Route::get('goadd', 'Admin\news\newsController@goadd')->name('admin.news.goadd');
        Route::post('add', 'Admin\news\newsController@add')->name('admin.news.add');
        Route::get('goedit/{id}', 'Admin\news\newsController@goedit')->name('admin.news.goedit');
        Route::post('edit/{id}', 'Admin\news\newsController@edit')->name('admin.news.edit');
        Route::get('delete/{id}', 'Admin\news\newsController@delete')->name('admin.news.delete');
        Route::get('comment', 'Admin\news\newsController@comment')->name('admin.news.comment');
        Route::get('comment/delete/{id}', 'Admin\news\newsController@comment_delete')->name('admin.news.comment.delete');
        Route::post('comment/status', 'Admin\news\newsController@comment_status')->name('admin.comment.status');
    });
    Route::prefix('product')->group(function () {
        /**
         * Admin // Product
         */

        Route::get('/{id}/cat', 'Admin\Product\ProductController@index')->name('admin.product.index');
        Route::get('/{id}/create', 'Admin\Product\ProductController@create')->name('admin.product.create');
        Route::post('/', 'Admin\Product\ProductController@store')->name('admin.product.store');
        Route::get('/{id}/edit', 'Admin\Product\ProductController@edit')->name('admin.product.edit');
        Route::post('/{id}/edit', 'Admin\Product\ProductController@update')->name('admin.product.update');
        Route::get('/{id}/delete', 'Admin\Product\ProductController@delete')->name('admin.product.delete');
    });
    Route::prefix('cat')->group(function () {
        /**
         * Admin // Product
         */

        Route::get('/', 'Admin\Category\CategoryController@index')->name('admin.cat.index');
        Route::get('/create', 'Admin\Category\CategoryController@create')->name('admin.cat.create');
        Route::post('/', 'Admin\Category\CategoryController@store')->name('admin.cat.store');
        Route::get('/{id}/edit', 'Admin\Category\CategoryController@edit')->name('admin.cat.edit');
        Route::post('/{id}/edit', 'Admin\Category\CategoryController@update')->name('admin.cat.update');
        Route::get('/{id}/delete', 'Admin\Category\CategoryController@delete')->name('admin.cat.delete');
    });

    Route::prefix('statistic')->group(function () {
        /**
         * Thống kê
         */
        Route:: get('/', 'Admin\Statistic\StatisticController@index')->name('admin.statistic.index');
        Route:: get('/char', 'Admin\Statistic\StatisticController@create')->name('admin.statistic.create');
        Route:: get('/{id}/chi-tiet', 'Admin\Statistic\StatisticController@show')->name('admin.statistic.chi-tiet');
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