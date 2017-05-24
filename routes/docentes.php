<?php

Route::group(['prefix' => 'docentes','middleware'=>'auth','namespace'=>'Docentes'], function() {

	Route::group(['namespace'=>'Notas'], function() {

		Route::resource('notas', 'NotasController',['names'=>'docentes.notas','only'=>['index']]);
		Route::resource('practicas', 'PracticasController',['names'=>'docentes.practicas','only'=>['index']]);
	});






















});

