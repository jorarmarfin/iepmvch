<?php

Route::group(['namespace'=>'Pdf','middleware'=>'auth'], function() {
	Route::get('recibo/{recibo}', 'ReciboMatriculaController@recibomatricula')->name('pdf.recibo.matricula');;
	Route::get('boletaventa/{boletaventa}', 'BoletaVentaController@show')->name('pdf.boletaventa.matricula');;
	Route::get('compromiso/{compromiso}', 'CompromisoMatriculaController@compromisomatricula')->name('pdf.compromiso.matricula');;
});

