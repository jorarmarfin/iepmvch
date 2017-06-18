<?php
Route::group(['namespace'=>'PlanCurricular'],function(){

	Route::resource('asignatura-grado-seccion', 'AsignaturaGradoSeccionController',['names'=>'admin.ags']);
	Route::get('asignatura-grado-seccion-delete/{id}','AsignaturaGradoSeccionController@delete')->name('admin.ags.delete');
	Route::post('ags-duplicar','AsignaturaGradoSeccionController@duplicar')->name('admin.ags.duplicar');


	Route::resource('personal_grado','PersonalGradoController',['names'=>'admin.personalgrado','only'=>['index','store','edit','update']]);
	Route::get('personal_grado-delete/{id}','PersonalGradoController@delete')->name('admin.personalgrado.delete');
});


