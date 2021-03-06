<?php

Route::group(['namespace'=>'Pdf','middleware'=>'auth'], function() {
	Route::get('recibo/{recibo}', 'ReciboMatriculaController@recibomatricula')->name('pdf.recibo.matricula');;
	Route::get('boletaventa/{boletaventa}', 'BoletaVentaController@show')->name('pdf.boletaventa.matricula');;
	Route::get('compromiso/{compromiso}', 'CompromisoMatriculaController@compromisomatricula')->name('pdf.compromiso.matricula');;
	Route::get('reporte-matricula', 'ReporteMatriculaController@reporte')->name('pdf.reporte.matricula');
	Route::get('reporte-matricula-grado', 'ReporteMatriculaController@reportegrado')->name('pdf.reporte.matriculagrado');
});

