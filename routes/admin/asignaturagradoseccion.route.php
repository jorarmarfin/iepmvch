<?php
Route::group(['namespace'=>'PlanCurricular'],function(){

	Route::resource('asignatura-grado-seccion', 'AsignaturaGradoSeccionController',['names'=>'admin.ags']);
	Route::get('asignatura-grado-seccion-delete/{id}','AsignaturaGradoSeccionController@delete')->name('admin.ags.delete');

});


