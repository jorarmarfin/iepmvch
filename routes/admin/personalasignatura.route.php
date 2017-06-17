<?php
Route::group(['namespace'=>'PersonalAsignatura'],function(){

	Route::resource('personal-asignatura', 'PersonalAsignaturaController',['names'=>'admin.personalasignatura']);
	Route::get('personal-asignatura-delete/{id}','PersonalAsignaturaController@delete')->name('admin.personalasignatura.delete');
	Route::get('personal-ags-combo/{idgrado}','PersonalAsignaturaController@combo')->name('admin.personalasignatura.combo');
	Route::get('personal-area-combo/{idgrado}','PersonalAsignaturaController@comboarea')->name('admin.personalasignatura.comboarea');
	Route::get('importar-grado-area','PersonalAsignaturaController@importargradoarea')->name('admin.personalasignatura.importar');
	Route::get('asignar-tutor/{id}','PersonalAsignaturaController@asignartutor')->name('admin.personalasignatura.tutor');
});


