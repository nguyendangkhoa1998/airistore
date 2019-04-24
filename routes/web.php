<?php

// Admin login
Route::get('admin-login','Admin\AdminController@Login')->name('admin.login');
Route::post('admin-login','Admin\AdminController@PostLogin');


// Customer register
Route::get('/register','PageController@Register')->name('register');

Route::post('/register','PageController@PostRegister');


// Customer login
Route::get('/login','PageController@Login')->name('login');

Route::post('/login','PageController@PostLogin');

// Customer Logout
Route::get('/logout','PageController@Logout')->name('logout');

// Home page
Route::get('/','PageController@Index')->name('home');

// Products
Route::get('/list-products/{id}','PageController@ListProducts')->name('list.products');

// Detail product
Route::get('/detail-product/{id}','PageController@DetailProducts')->name('detail.product');

// Comment product
Route::post('post-comment','PageController@PostComment')->name('post.comment');

// Group route add cart
Route::group(['prefix' => 'cart','middleware'=>'clientCart'], function() {

    Route::get('add-cart/{id}',"PageController@addCart")->name('add.cart');

    Route::get('delete-cart/{id}',"PageController@deleteCart")->name('delete.cart');

    Route::get('view-cart',"PageController@viewCart")->name('view.cart');

    Route::post('oder',"PageController@oder")->name('oder');
});

// My-order
Route::get('my-order','PageController@MyOrder')->name('my.order');

//Order detail
Route::get('detail-order/{id}','PageController@DetailOrder')->name('detail.order');



