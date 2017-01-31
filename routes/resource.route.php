<?php
Route::group(['namespace'=>'Resource','middleware'=>'auth'], function() {
	Route::get('avatar','ResourceController@getavatar');
	Route::get('ubigeo','ResourceController@ubigeo');
	Route::get('familiares','ResourceController@familiares');
	Route::get('alumnos-matriculables','ResourceController@matriculables');
	Route::get('productos','ResourceController@productos');
});