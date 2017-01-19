<?php

//Route::resource('familiar', 'FamiliarController',['names'=>'admin.familiar']);
Route::get('familiar/lists/{id}','FamiliarController@lists')->name('admin.familiar.lists');
Route::post('familiar/','FamiliarController@store')->name('admin.familiar.store');
Route::get('familiar/create/{familiar}','FamiliarController@create')->name('admin.familiar.create');
Route::get('familiar/{familiar}','FamiliarController@show')->name('admin.familiar.show');
Route::get('familiar/{familiar}/edit','FamiliarController@edit')->name('admin.familiar.edit');
Route::put('familiar/{familiar}','FamiliarController@update')->name('admin.familiar.update');
Route::get('familiar/delete/{familiar}','FamiliarController@delete')->name('admin.familiar.delete');
Route::delete('familiar/{familiar}','FamiliarController@destroy')->name('admin.familiar.destroy');
Route::post('familiar/relation','FamiliarController@relation')->name('admin.familiar.relation');


