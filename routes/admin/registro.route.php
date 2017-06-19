<?php

Route::group(['namespace'=>'Registro'], function() {
	/**
	 * Rutas de Registros
	 */
	Route::get('registros','RegistroController@index' )->name('admin.registro.index');
	Route::get('registros-reporte/{nivel}','RegistroController@reporte' )->name('admin.registro.reporte');
	Route::get('registros-pdf/{nivel}','RegistroController@pdf')->name('admin.registro.pdf');
});
