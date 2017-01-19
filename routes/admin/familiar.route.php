<?php

//Route::resource('familiar', 'FamiliarController',['names'=>'admin.familiar']);
Route::get('familiar/lists/{id}','FamiliarController@lists')->name('admin.familiar.lists');
Route::get('familiar/create/{id}','FamiliarController@create')->name('admin.familiar.create');
Route::post('familiar/store','FamiliarController@store')->name('admin.familiar.store');
Route::get('familiar/edit/{familiar}','FamiliarController@edit')->name('admin.familiar.edit');
Route::put('familiar/update/{familiar}','FamiliarController@update')->name('admin.familiar.update');



