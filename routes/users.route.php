<?php
Route::group(['middleware' => 'auth','namespace'=>'Users'], function() {

	Route::get('perfil', 'UsersController@perfil')->name('users.perfil');
	Route::put('perfil-update/{id}', 'UsersController@update')->name('users.update');
});

