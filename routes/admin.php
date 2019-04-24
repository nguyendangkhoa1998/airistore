<?php
Route::get('/','AdminController@Index')->name('admin.dashboard');

Route::get('/admin-logout','AdminController@Logout')->name('admin.logout');

