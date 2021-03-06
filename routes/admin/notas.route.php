<?php

Route::group(['namespace'=>'Notas'], function() {
	/**
	 * Activar Practicas
	 */
	Route::get('activar-practicas','ActivarPracticasController@index' )->name('admin.notas.activar.index');
	Route::post('activar-practicas','ActivarPracticasController@store' )->name('admin.notas.activar.store');
	/**
	 * Notas Trimestrales
	 */
	Route::get('notas','NotasController@index')->name('admin.notas.index');
	Route::get('notas-trimestral-docente','TrimestralController@docente')->name('admin.notas.trimestral.docente');
	Route::post('activar-trimestre','ActivarPracticasController@trimestre' )->name('admin.notas.activar.trimestre');

});
