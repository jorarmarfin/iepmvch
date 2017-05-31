<?php
Route::group(['prefix' => 'notas','middleware'=>'auth','namespace'=>'Padres'], function() {
	Route::group(['namespace'=>'Notas'], function() {

	Route::get('notas', 'NotasController@index')->name('padres.notas.index');









	});
});
