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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home',function () {
//    return view('admin.index');
//});

Route::resource('categories','CategoriesController');
Route::get('trashed-categories','CategoriesController@trashed')->name('categories.trashed');
Route::get('restore-categories/{categories}','CategoriesController@restore')->name('categories.restore');

Route::resource('post','PostController');
Route::get('trashed-post','PostController@trashed')->name('post.trashed');
Route::get('restore-post/{post}','PostController@restore')->name('post.restore');