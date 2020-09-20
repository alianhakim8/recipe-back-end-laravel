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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/post', 'HomeController@create')->name('create');
Route::post('/home/post', 'HomeController@store')->name('store');
Route::get('/home/update/{post}','HomeController@edit')->name('edit');
Route::patch('/home/update/{post}','HomeController@update')->name('update');
Route::get('/home/delete/{post}','HomeController@destroy')->name('delete');
Route::get('/home/user','HomeController@postUser')->name('post.user');
