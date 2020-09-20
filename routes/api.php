<?php

use Illuminate\Http\Request;

Route::get('/users','AuthController@show');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

Route::get('/post','PostController@show')->middleware('auth:api');
Route::post('/post','PostController@store')->middleware('auth:api');
Route::put('post/{post}','PostController@update')->middleware('auth:api');
Route::delete('post/{post}','PostController@destroy')->middleware('auth:api');
Route::get('post/user','PostController@getPostUser')->middleware('auth:api');
Route::get('post/{post}','PostController@postDetails')->middleware('auth:api');
