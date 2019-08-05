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
Route::get('/create', 'BlogController@create');
Route::post('/', 'BlogController@store');
Route::get('/{post}/edit', 'BlogController@edit');
Route::patch('/blog/{post}', 'BlogController@update');
Route::delete('/blog/{post}', 'BlogController@destroy');

Route::get('/blog/{post}', 'BlogController@show');

Route::get('/category/{category}', 'BlogController@category');

Route::get('/author/{author}', 'BlogController@author');
Auth::routes();

Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard')->middleware('checkrole');
Route::resource('/dashboard/posts', 'Backend\BlogController')->middleware('checkrole');
Route::resource('/dashboard/tags', 'Backend\CategoriesController')->middleware('checkrole');
Route::resource('/dashboard/users', 'Backend\UsersController')->middleware('admin');

Route::post('/blog/{post}/comments', 'CommentsController@store');
Route::delete('/blog/{post}/comments/{comment}', 'CommentsController@destroy');
