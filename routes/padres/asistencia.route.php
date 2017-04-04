<?php
Route::group(['prefix' => 'padres','middleware'=>'auth','namespace'=>'Padres'], function() {
	Route::group(['namespace'=>'Asistencia'],function(){
		Route::resource('asistencia', 'AsistenciaController',['names'=>'padres.asistencia']);
		Route::get('asistencia-hijo/{id}','AsistenciaController@hijos')->name('padres.asistencia.hijos');
	});

});
