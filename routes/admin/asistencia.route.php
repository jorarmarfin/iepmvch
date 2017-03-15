<?php

Route::get('asistencia','Asistencia\AsistenciaController@index')->name('admin.asistencia.index');
Route::post('asistencia','Asistencia\AsistenciaController@store')->name('admin.asistencia.store');
Route::get('asistencia-estado/{id}/{estado}','Asistencia\AsistenciaController@estado')->name('admin.asistencia.estado');



