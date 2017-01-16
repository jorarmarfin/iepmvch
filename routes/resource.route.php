<?php
Route::group(['namespace'=>'Resource','middleware'=>'auth'], function() {
	Route::get('avatar','ResourceController@getavatar');
	Route::get('ubigeo','ResourceController@ubigeo');
});