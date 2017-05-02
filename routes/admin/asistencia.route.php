<?php
Route::group(['namespace'=>'Asistencia'], function() {
	Route::resource('asistencia','AsistenciaController',['names'=>'admin.asistencia','only'=>['index','store','show']]);
	Route::get('asistencia-estado/{id}/{estado}','AsistenciaController@estado')->name('admin.asistencia.estado');
	Route::get('asistencia-resumen','AsistenciaController@resumen')->name('admin.asistencia.resumen');

});



