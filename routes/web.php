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

Route::get('/blog/create', 'BlogController@create');
Route::post('/blog', 'BlogController@store');
Route::delete('/blog/{post}', 'BlogController@destroy');


Route::get('/blog/{post}', 'BlogController@show');

Route::get('/category/{category}', 'BlogController@category');

Route::get('/author/{author}', 'BlogController@author');
Auth::routes();

Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard');

// Route::resource('/backend/blog', 'Backend\BlogController')->middleware('checkrole');

// Route::group(['middleware'=>['admin', 'editor','author']],function () {
//   Route::resource('/backend/blog', 'Backend\BlogController');
//   });

Route::group(['middleware' => ['role:admin' or 'role:editor' or 'role:author']], function () {
  Route::resource('/backend/blog', 'Backend\BlogController');
});
Route::resource('/backend/categories', 'Backend\CategoriesController')->middleware('checkrole');

Route::resource('/backend/users', 'Backend\UsersController')->middleware('admin');
