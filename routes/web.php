<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.critaku');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about.critaku');

Route::get('/blog', 'App\Http\Controllers\BlogController@index')->name('blog.critaku');
Route::get('/blog/{blog:slug}', 'App\Http\Controllers\BlogController@show')->name('blog.critaku.show');
Route::get('/blog/author/{author:username}', 'App\Http\Controllers\UserController@index')->name('blog.author.critaku');

Route::get('/topics', 'App\Http\Controllers\CategoryController@index')->name('topics.critaku');
Route::get('/topics/{category:slug}', 'App\Http\Controllers\CategoryController@show')->name('topics.critaku.show');
