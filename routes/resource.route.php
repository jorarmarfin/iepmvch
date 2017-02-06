<?php
Route::group(['namespace'=>'Resource','middleware'=>'auth'], function() {
	Route::get('avatar','ResourceController@getavatar');
	Route::get('ubigeo','ResourceController@ubigeo');
	Route::get('familiares','ResourceController@familiares');
	Route::get('numidentificacion','ResourceController@numidentificacion');
	Route::get('alumnos-matriculables','ResourceController@matriculables');
	Route::get('alumnos-matriculados','ResourceController@matriculados');
	Route::get('productos','ResourceController@productos');
});