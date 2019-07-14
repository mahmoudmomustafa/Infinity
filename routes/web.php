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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/blog/{post}', 'BlogController@show');

Route::get('/category/{category}', 'BlogController@category');

Route::get('/author/{author}','BlogController@author');
Auth::routes();

Route::get('/home', 'Backend\HomeController@index');

Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::resource('/backend/users', 'Backend\UsersController');
