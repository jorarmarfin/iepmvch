<?php

//Route::resource('familiar', 'FamiliarController',['names'=>'admin.familiar']);
Route::get('familiar/lists/{id}','FamiliarController@lists')->name('admin.familiar.lists');
Route::get('familiar/','FamiliarController@index')->name('admin.familiar.index');
Route::post('familiar/','FamiliarController@store')->name('admin.familiar.store');
Route::get('familiar/create/{familiar}','FamiliarController@create')->name('admin.familiar.create');
Route::get('familiar/{familiar}','FamiliarController@show')->name('admin.familiar.show');
Route::get('familiar/{familiar}/edit','FamiliarController@edit')->name('admin.familiar.edit');
Route::put('familiar/{familiar}','FamiliarController@update')->name('admin.familiar.update');
Route::get('familiar/delete/{familiar}','FamiliarController@delete')->name('admin.familiar.delete');
Route::delete('familiar/{familiar}','FamiliarController@destroy')->name('admin.familiar.destroy');
Route::post('familiar/relation','FamiliarController@relation')->name('admin.familiar.relation');
Route::get('familiar/quitar/{familiar}','FamiliarController@quitar')->name('admin.familiar.quitar');

/**
 * Crea usuario
 */
Route::get('familiar-crea-usuario/{personal}','FamiliarController@createuser')->name('admin.familiar.createuser');
/**
 * Envia Email
 */
Route::get('familiar-send-user/{personal}','FamiliarController@senduser')->name('admin.familiar.senduser');


