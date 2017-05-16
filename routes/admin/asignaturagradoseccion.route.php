<?php
Route::group(['namespace'=>'PlanCurricular'],function(){

	Route::resource('asignatura-grado-seccion', 'AsignaturaGradoSeccionController',['names'=>'admin.ags']);
	Route::get('asignatura-grado-seccion-delete/{id}','AsignaturaGradoSeccionController@delete')->name('admin.ags.delete');
	Route::post('ags-duplicar','AsignaturaGradoSeccionController@duplicar')->name('admin.ags.duplicar');

});


