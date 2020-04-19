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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('category/{category}', 'WelcomeController@category')->name('category');

Route::get('tag/{tag}', 'WelcomeController@tag')->name('tag');
Route::get('abouts-us/', 'WelcomeController@about')->name('about.us');


Auth::routes([]);

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

Route::resource('tags','TagsController');

Route::middleware(['auth'])->group(function (){
    Route::resource('user','UserController');
    Route::get('changeStatus', 'UserController@changeStatus');

    Route::resource('categories','CategoriesController');
    Route::get('trashed-categories','CategoriesController@trashed')->name('categories.trashed');
    Route::get('restore-categories/{categories}','CategoriesController@restore')->name('categories.restore');

    Route::resource('post','PostController');
    Route::get('trashed-post','PostController@trashed')->name('post.trashed');
    Route::get('restore-post/{post}','PostController@restore')->name('post.restore');

    Route::resource('tags','TagsController');

});

Route::resource('contact','ContactController');
Route::get('contactDetails', 'ContactController@changeStatus');

Route::middleware(['verifyIsAdmin'])->group(function (){

    Route::resource('about','AboutController');
    Route::get('AboutchangeStatus', 'AboutController@changeStatus');


    Route::resource('team','TeamController');
    Route::get('teamChangeStatus', 'TeamController@changeStatus');

    Route::resource('page_config','PageConfigController');
Route::get('site_config','PageConfigController@site_config')->name('site_config');
Route::PUT('site_config','PageConfigController@site_config_update')->name('site_config_update');
});






