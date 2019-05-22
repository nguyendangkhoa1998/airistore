<?php
Route::get('/dashboard','AdminController@Index')->name('dashboard');

Route::get('/admin-logout','AdminController@Logout')->name('admin.logout');

Route::group(['prefix' => 'products'],function () {

	Route::get('index','ProductController@Index')->name('index.product');

});

Route::group(['prefix' => 'category'],function(){

	Route::get('index','CategoryController@Index')->name('index.category');

	Route::get('add','CategoryController@Add')->name('add.category');

	Route::post('add','CategoryController@PostAdd');

	Route::get('edit/{id}','CategoryController@GetEdit')->name('edit.category');

	Route::post('edit/{id}','CategoryController@PostEdit');

	Route::get('delete/{id}','CategoryController@Delete')->name('delete.category');

});

Route::group(['prefix' => 'categories-child'], function() {

    Route::get('index','CategoriesChildController@Index')->name('index.categories.child');

	Route::get('add','CategoriesChildController@Add')->name('add.categories.child');

	Route::post('add','CategoriesChildController@PostAdd');

	Route::get('edit/{id}','CategoriesChildController@GetEdit')->name('edit.categories.child');

	Route::post('edit/{id}','CategoriesChildController@PostEdit');

	Route::get('delete/{id}','CategoriesChildController@Delete')->name('delete.categories.child');

});

