<?php

//Route::resource('familiar', 'FamiliarController',['names'=>'admin.familiar']);
Route::get('familiar/lists/{id}','FamiliarController@lists')->name('admin.familiar.lists');
Route::get('familiar/create/{id}','FamiliarController@create')->name('admin.familiar.create');
Route::post('familiar/store','FamiliarController@store')->name('admin.familiar.store');



