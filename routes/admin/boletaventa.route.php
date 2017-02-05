<?php

Route::resource('boletaventa', 'BoletaVentaController',['names'=>'admin.boletaventa']);
Route::get('boletaventa/file/{boletaventa}','BoletaVentaController@file')->name('admin.boletaventa.file');

