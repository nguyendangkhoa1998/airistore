<?php

//Admin login
Route::get('admin-login','Admin\AdminController@Login')->name('admin.login');
Route::post('admin-login','Admin\AdminController@PostLogin');


//Customer register
Route::get('/register','PageController@Register')->name('register');

Route::post('/register','PageController@PostRegister');


//Customer login
Route::get('/login','PageController@Login')->name('login');

Route::post('/','PageController@PostLogin');


//Home page
Route::get('/','PageController@Index')->name('home');

//Products
Route::get('/list-products/{id}','PageController@ListProducts')->name('list.products');

//Detail product
Route::get('/detail-product/{id}','PageController@DetailProducts')->name('detail.product');

//Comment product
Route::post('post-comment','PageController@PostComment')->name('post.comment');

//My-order
Route::get('my-order','PageController@MyOrder')->name('my.order');

//Order detail
Route::get('detail-order/{id}','PageController@DetailOrder')->name('detail.order');



