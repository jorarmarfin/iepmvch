<?php

Route::resource('matricula', 'MatriculaController',['names'=>'admin.matricula']);
Route::get('matricula/delete/{matricula}','MatriculaController@delete')->name('admin.matricula.delete');
Route::get('matricula/recibo/{matricula}','MatriculaController@recibo')->name('admin.matricula.recibo');
Route::get('matricula/print/{matricula}','MatriculaController@printrecibo')->name('admin.matricula.print');

