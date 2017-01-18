<?php

Route::resource('alumnos', 'AlumnosController',['names'=>'admin.alumnos']);
Route::get('alumnos/delete/{id}','AlumnosController@delete')->name('admin.alumnos.delete');



