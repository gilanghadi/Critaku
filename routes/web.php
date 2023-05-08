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


Route::get('/signin', 'App\Http\Controllers\UserController@signin')->name('signin.critaku')->middleware('guest');
Route::post('/signin', 'App\Http\Controllers\UserController@authenticate')->name('signinPost.critaku');
Route::get('/register', 'App\Http\Controllers\UserController@register')->name('register.critaku')->middleware('guest');
Route::post('/register', 'App\Http\Controllers\UserController@registerStore')->name('registerPost.critaku');
Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout.critaku');

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home.critaku')->middleware('auth');
Route::get('/dashboard/profile', 'App\Http\Controllers\HomeController@profile')->name('profile.critaku')->middleware('auth');
Route::post('/dashboard/profile/{id}/update', 'App\Http\Controllers\UserController@updateProfile')->name('profileUpdate.critaku')->middleware('auth');

Route::get('/blog', 'App\Http\Controllers\BlogController@index')->name('blog.critaku');
Route::get('/blog/show/{blog:slug}', 'App\Http\Controllers\BlogController@show')->name('blog.critaku.show');
Route::get('/blog?author={author:username}', 'App\Http\Controllers\UserController@index')->name('blog.author.critaku');

Route::get('/dashboard/blog/checkSlug', 'App\Http\Controllers\BlogController@checkSlug')->middleware('auth');
Route::get('/dashboard/blog/create',  'App\Http\Controllers\BlogController@create')->name('homeCreate.critaku')->middleware('auth');
Route::post('/dashboard/blog/store',  'App\Http\Controllers\BlogController@store')->name('homeStore.critaku')->middleware('auth');
Route::get('/dashboard/blog/{blog:slug}/edit',  'App\Http\Controllers\BlogController@edit')->name('homeEdit.critaku')->middleware('auth');
Route::post('/dashboard/blog/{blog:slug}/update',  'App\Http\Controllers\BlogController@update')->name('homeUpdate.critaku')->middleware('auth');
Route::get('/dashboard/blog/{blog:slug}/delete', 'App\Http\Controllers\BlogController@destroy')->name('homeDelete.critaku')->middleware('auth');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.critaku');
Route::get('/blog?category={category:slug}', 'App\Http\Controllers\CategoryController@show')->name('category.critaku.show');
