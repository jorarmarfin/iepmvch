<?php

Route::resource('alumnos', 'AlumnosController',['names'=>'admin.alumnos']);
Route::get('alumnos/delete/{alumnos}','AlumnosController@delete')->name('admin.alumnos.delete');
Route::get('alumnos/matricular/{alumnos}','AlumnosController@matricular')->name('admin.alumnos.matricular');



