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


Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/create','postController@create')->name('posts.create');
Route::post('posts','postController@store')->name('posts.store');
Route::get('posts','postController@index')->name('posts.index');
Route::get('posts/{post_id}','postController@show')->name('posts.show');

Route::get('posts/{post_id}/edit','postController@edit')->name('post.edit');
Route::patch('posts/{post_id}','postController@update')->name('post.update');
Route::delete('posts/{post_id}','postController@destroy')->name('post.destroy');

Route::post('/comments','commentController@store')->name('comments.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
