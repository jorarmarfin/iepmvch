<?php

//Route::resource('hermanos', 'HermanosController',['names'=>'admin.hermanos']);

Route::get('hermanos/{hermanos}','HermanosController@show')->name('admin.hermanos.show');
Route::get('admin/hermanos/{hermanos}/edit','HermanosController@edit')->name('admin.hermanos.edit');
Route::get('hermanos/entrego/{entrego}/{id}','HermanosController@entrego')->name('admin.hermanos.entrego');
Route::post('hermanos/','HermanosController@store')->name('admin.hermanos.store');

