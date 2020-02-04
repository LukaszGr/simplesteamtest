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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/post', 'HomeController@createPost')->name('create_post');
Route::post('/save/post', 'HomeController@savePost')->name('save_post');
Route::get('/show/post/{post}', 'HomeController@showPost')->name('show_post');
Route::get('/edit/post/{post}', 'HomeController@editPost')->name('edit_post');
Route::post('/update/post/{post}', 'HomeController@updatePost')->name('update_post');
Route::post('/delete/post/{post}', 'HomeController@deletePost')->name('delete_post');