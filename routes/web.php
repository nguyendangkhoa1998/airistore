<?php
					/*----Admin login------*/
Route::get('admin-login','Admin\AdminController@Login')->name('admin.login');

Route::post('admin-login','Admin\AdminController@PostLogin');


					/*------Customer register------*/
Route::get('/register','CustomerController@Register')->name('register');

Route::post('/register','CustomerController@PostRegister');

					/*------Customer login------*/
Route::get('/login','CustomerController@Login')->name('login');

Route::post('/login','CustomerController@PostLogin');

					/*------Customer logout------*/
Route::get('/logout','CustomerController@Logout')->name('logout');


					/*------Home page------*/
Route::get('/','PageController@Index')->name('home');

					/*------List Products------*/
Route::get('/list-products/{id}','PageController@ListProducts')->name('list.products');

					/*------ Detail Product ------*/
Route::get('/detail-product/{id}.html','PageController@DetailProducts')->name('detail.product');

					/*------ Post Comment Product ------*/
Route::post('post-comment','PageController@PostComment')->name('post.comment');

					/*------ Group routes Cart ------*/
Route::group(['prefix' => 'cart','middleware'=>'clientCart'], function() {

    Route::get('add-cart/{id}',"CartController@AddCart")->name('add.cart');

    Route::get('delete-cart/{id}',"CartController@DeleteCart")->name('delete.cart');

    Route::get('view-cart',"CartController@ViewCart")->name('view.cart');

    Route::post('order',"CartController@Order")->name('order');
});

					/*------ My Order ------*/
Route::get('my-order','PageController@MyOrder')->name('my.order');

					/*------ Order Detail ------*/
Route::get('detail-order/{id}','PageController@DetailOrder')->name('detail.order');



