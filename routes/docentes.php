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
		/**
		 * Notas de comportamiento
		 */
		Route::get('comportamiento', 'ComportamientoController@index')->name('docentes.comportamiento.index');
		Route::get('comportamiento/{asignatura}/{trimestre}', 'ComportamientoController@show')->name('docentes.comportamiento.show');
		Route::post('ingresa-comportamiento', 'ComportamientoController@ingresa')->name('docentes.comportamiento.ingresa');
		/**
		 * Notas de indicadores
		 */
		Route::get('indicadores', 'IndicadoresController@index')->name('docentes.indicadores.index');
		Route::get('indicadores/{asignatura}/{trimestre}', 'IndicadoresController@show')->name('docentes.indicadores.show');
		Route::post('ingresa-indicadores', 'IndicadoresController@ingresa')->name('docentes.indicadores.ingresa');
		/**
		 * Notas de Actitud
		 */
		Route::get('actitud', 'ActitudController@index')->name('docentes.actitud.index');
		Route::get('actitud/{asignatura}/{trimestre}', 'ActitudController@show')->name('docentes.actitud.show');
		Route::post('ingresa-actitud', 'ActitudController@ingresa')->name('docentes.actitud.ingresa');
		/**
		 * Notas de Cuaderno
		 */
		Route::get('cuaderno', 'CuadernoController@index')->name('docentes.cuaderno.index');
		Route::get('cuaderno/{asignatura}/{trimestre}', 'CuadernoController@show')->name('docentes.cuaderno.show');
		Route::post('ingresa-cuaderno', 'CuadernoController@ingresa')->name('docentes.cuaderno.ingresa');
		/**
		 * Notas de Padres
		 */
		Route::get('padres', 'PadresController@index')->name('docentes.padres.index');
		Route::get('padres-show/{trimestre}', 'PadresController@show')->name('docentes.padres.show');
		Route::post('padres-store', 'PadresController@store')->name('docentes.padres.store');



	});

	Route::group(['namespace'=>'Capacidades'], function() {
		Route::resource('capacidades','CapacidadesController',['names'=>'docentes.capacidades','only'=>['index','show','store','edit','update']]);
		Route::get('capacidades-delete/{id}','CapacidadesController@delete')->name('docentes.capacidades.delete');

		Route::resource('capacidad-indicadores','IndicadoresController',['names'=>'docentes.capacidad.indicadores','only'=>['index','show','store','edit','update']]);
		Route::get('indicador-capacidad-delete/{id}','IndicadoresController@delete')->name('docentes.capacidad.indicadores.delete');



	});





















});

