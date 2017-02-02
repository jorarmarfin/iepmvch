<?php

//Route::resource('boletaventa', 'BoletaVentaController',['names'=>'admin.boletaventa']);

Route::get('serie','SerieController@index')->name('admin.serie.index');
Route::get('serie/create','SerieController@create')->name('admin.serie.create');
Route::post('serie','SerieController@store')->name('admin.serie.store');

