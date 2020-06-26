<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostsController@index')->name('index');
Route::get('/posts/{id}', 'PostsController@show')->name('view-post');
Route::post('/posts/receive-email-response', 'PostsController@receiveEmailResponse');
Route::get('send-email', 'PostsController@sendMails');
