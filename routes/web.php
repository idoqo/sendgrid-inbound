<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostsController@index')->name('index');
Route::get('/posts/{id}', 'PostsController@show')->name('view-post');

// this will receive web-hooks from SendGrid each time someone replies to our email
Route::post('/posts/receive-email-response', 'PostsController@receiveEmailResponse');
Route::get('send-mail', 'PostsController@sendMails');
