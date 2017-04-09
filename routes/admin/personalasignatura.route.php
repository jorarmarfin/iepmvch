<?php
Route::group(['namespace'=>'PersonalAsignatura'],function(){

	Route::resource('asignatura-grado-seccion', 'PersonalAsignaturaController',['names'=>'admin.personalasignatura']);
	Route::get('asignatura-grado-seccion-delete/{id}','PersonalAsignaturaController@delete')->name('admin.personalasignatura.delete');

});


