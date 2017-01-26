<?php

Route::resource('personal', 'PersonalController',['names'=>'admin.personal']);
Route::get('personal/delete/{personal}','PersonalController@delete')->name('admin.personal.delete');
Route::get('personal/activo/{personal}','PersonalController@activo')->name('admin.personal.activo');
Route::get('personal-inactivo','PersonalController@inactivo')->name('admin.personal.inactivo');


Route::resource('disponibilidad', 'DisponibilidadController',['names'=>'admin.disponibilidad']);
Route::get('disponibilidad/delete/{personal}','DisponibilidadController@delete')->name('admin.disponibilidad.delete');





