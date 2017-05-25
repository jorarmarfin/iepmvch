<?php

Route::group(['prefix' => 'docentes','middleware'=>'auth','namespace'=>'Docentes'], function() {

	Route::group(['namespace'=>'Notas'], function() {

		Route::resource('notas', 'NotasController',['names'=>'docentes.notas','only'=>['index']]);
		Route::get('practicas', 'PracticasController@index')->name('docentes.practicas.index');
		Route::get('practica/{asignatura}/{practica}', 'PracticasController@show')->name('docentes.practica.show');

	});






















});

