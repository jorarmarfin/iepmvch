<?php

Route::group(['prefix' => 'docentes','middleware'=>'auth','namespace'=>'Docentes'], function() {

	Route::group(['namespace'=>'Notas'], function() {

		Route::resource('notas', 'NotasController',['names'=>'docentes.notas','only'=>['index']]);
		/**
		 * Practicas
		 */
		Route::get('practicas', 'PracticasController@index')->name('docentes.practicas.index');
		Route::get('practicas/{asignatura}/{trimestre}', 'PracticasController@show')->name('docentes.practicas.show');
		Route::post('ingresa-practica', 'PracticasController@ingresa')->name('docentes.practicas.ingresa');

		Route::get('practica-ingresa/{periodo}/{personalasignatura}/{practica}', 'PracticasController@edit')->name('docentes.practica.edit');
		Route::post('practica-notas', 'PracticasController@notas')->name('docentes.practica.notas');
		/**
		 * Notas Trimestrales
		 */
		Route::get('trimestral', 'NotasTrimestralesController@index')->name('docentes.trimestral.index');
		Route::get('trimestral/{asignatura}/{trimestre}', 'NotasTrimestralesController@show')->name('docentes.trimestral.show');
		Route::post('ingresa-trimestral', 'NotasTrimestralesController@ingresa')->name('docentes.trimestral.ingresa');

		Route::get('trimestral-ingresa/{periodo}/{personalasignatura}/{trimestral}', 'NotasTrimestralesController@edit')->name('docentes.trimestral.edit');
		Route::post('trimestral-notas', 'NotasTrimestralesController@notas')->name('docentes.trimestral.notas');




	});






















});

