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

// Route::get('/backend/blog', 'Backend\BlogController@index')->name('backend.index');

// Route::get('/backend/blog/create', 'Backend\BlogController@create')->name('backend.create');

// Route::post('/backend/blog', 'Backend\BlogController@store')->name('backend.store');

// Route::get('/backend/blog/{post}/edit', 'Backend\BlogController@edit')->name('backend.edit');

// Route::get('/backend/blog/{post}', 'Backend\BlogController@update')->name('backend.update');

// Route::get('/backend/blog{post}', 'Backend\BlogController@destroy')->name('backend.delete');