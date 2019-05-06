<?php
Route::get('/','AdminController@index')->name('dashboard');

Route::get('/admin-logout','AdminController@Logout')->name('admin.logout');

Route::group(['prefix' => 'products'], function () {

    Route::get('list','AdminController@ListProducts')->name('admin.list.product');

});

