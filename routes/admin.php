<?php
Route::get('/dashboard','AdminController@Index')->name('dashboard');

Route::get('/admin-logout','AdminController@Logout')->name('admin.logout');

Route::group(['prefix' => 'products'],function () {

    Route::get('index','ProductController@Index')->name('index.product');

});

Route::group(['prefix' => 'category'],function(){

	Route::get('index','CategoryController@Index')->name('index.category');

	Route::get('add','CategoryController@Add')->name('add.category');

	Route::get('edit/{id}','CategoryController@GetEdit')->name('edit.category');

	Route::post('edit/{id}','CategoryController@PostEdit')->name('edit.category');

	Route::get('delete/{id}','CategoryController@Delete')->name('delete.category');

});

