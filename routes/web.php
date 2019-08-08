<?php

/**
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
use Illuminate\Http\Request;
Route::group(
    ['middleware'=>'auth'], function () {

        Route::get('/', 'PostsController@index')->name('homepage');


        Route::get('/post/add', 'PostsController@create')->name('post.add');
        Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
        Route::post('/post/add', 'PostsController@store')->name('post.store');
        Route::post('/post/edit/{id}', 'PostsController@update')->name('post.update');
        Route::get('/post/detele/{id}', 'PostsController@destroy')->name('postdetele');


        Route::get('/cate', 'CateController@index')->name('catehome');
        Route::get('/cate/add', 'CateController@create')->name('cate.add');
        Route::post('/cate/add', 'CateController@store')->name('cate.store');
        Route::get('/cate/detele/{id}', 'CateController@destroy')->name('catedetele');
        Route::get('/cate/edit/{id}', 'CateController@edit')->name('cate.edit');
        Route::post('/cate/edit/{id}', 'CateController@update')->name('cate.update');



        Route::get('/pro', 'ProductController@index')->name('pro.home');
        Route::get('/pro/details/{id}', 'ProductController@details')->name('pro.details');
        Route::get('/pro/add', 'ProductController@create')->name('pro.add');
        Route::post('/pro/add', 'ProductController@store')->name('pro.store');
        Route::get('/pro/delete/{id}', 'ProductController@destroy')->name('pro.destroy');
    }
);
Route::get('/login', 'Auth\LoginController@loginForm')->name('login');
Route::post('/login', 'Auth\LoginController@store');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');