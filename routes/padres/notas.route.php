<?php
Route::group(['prefix' => 'notas','middleware'=>'auth','namespace'=>'Padres'], function() {
	Route::group(['namespace'=>'Notas'], function() {

	Route::get('trimestre', 'NotasController@index')->name('padres.notas.index');
	Route::get('notas-estudiante/{trimestre}', 'NotasController@estudiante')->name('padres.notas.estudiante');
	Route::get('notas-tipo/{trimestre}/{id}', 'NotasController@tiponota')->name('padres.notas.tiponota');
	Route::get('mostrar-notas/{trimestre}/{id}/{tipo}', 'NotasController@mostrarnota')->name('padres.notas.mostrarnota');









	});
});
