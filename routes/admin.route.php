<?php
Route::group(['prefix' => 'admin','middleware'=>'auth','namespace'=>'Admin'], function() {
	Route::resource('users', 'UsersController',['names'=>'admin.users']);
});


