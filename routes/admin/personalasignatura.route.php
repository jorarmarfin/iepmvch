<?php
Route::group(['namespace'=>'PersonalAsignatura'],function(){

	Route::resource('personal-asignatura', 'PersonalAsignaturaController',['names'=>'admin.personalasignatura']);
	Route::get('personal-asignatura-delete/{id}','PersonalAsignaturaController@delete')->name('admin.personalasignatura.delete');
	Route::get('personal-ags-combo/{idgrado}','PersonalAsignaturaController@combo')->name('admin.personalasignatura.combo');
});


