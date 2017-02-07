<?php

Route::resource('boletaventa', 'BoletaVentaController',['names'=>'admin.boletaventa']);
Route::get('boletaventa/delete/{id}','BoletaVentaController@delete')->name('admin.boletaventa.delete');
Route::post('boletaventa/numeracion','BoletaVentaController@storenumeracion')->name('admin.boletaventa.storenumeracion');


