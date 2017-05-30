<?php

Route::group(['prefix' => 'docentes','middleware'=>'auth','namespace'=>'Docentes'], function() {

	Route::group(['namespace'=>'Notas'], function() {

		Route::resource('notas', 'NotasController',['names'=>'docentes.notas','only'=>['index']]);
		Route::get('practicas', 'PracticasController@index')->name('docentes.practicas.index');
		Route::get('practica/{asignatura}', 'PracticasController@show')->name('docentes.practica.show');
		Route::get('practica-ingresa/{periodo}/{personalasignatura}/{practica}', 'PracticasController@edit')->name('docentes.practica.edit');
		Route::post('practica-notas', 'PracticasController@notas')->name('docentes.practica.notas');

	});






















});

