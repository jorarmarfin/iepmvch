<?php

Route::group(['namespace'=>'Pdf','middleware'=>'auth'], function() {
	Route::get('recibo/{recibo}', 'ReciboMatriculaController@recibomatricula')->name('pdf.recibo.matricula');;
});

