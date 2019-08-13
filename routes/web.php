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
Route::resource('/author', 'UserController');

// Route::resource('/author', 'UserController')->middleware('verified');
Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard')->middleware('checkrole');
Route::resource('/dashboard/posts', 'Backend\BlogController')->middleware('checkrole');
Route::resource('/dashboard/tags', 'Backend\CategoriesController')->middleware('checkrole');
Route::resource('/dashboard/users', 'Backend\UsersController')->middleware('admin');

Route::post('/blog/{post}/comments', 'CommentsController@store');
Route::delete('/blog/{post}/comments/{comment}', 'CommentsController@destroy');

Route::post('/blog/{post}/likes', 'BlogController@likePost');
Route::delete('/blog/{post}/likes', 'BlogController@likePost');

// github
// Route::get('auth/github', 'Auth\LoginController@redirectToProvider');
// Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback');