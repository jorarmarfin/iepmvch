<?php

Route::get('retiro/{retiro}','RetiroController@show')->name('admin.retiro.show');
Route::put('retiro/{retiro}','RetiroController@update')->name('admin.retiro.update');
Route::post('retiro/','RetiroController@store')->name('admin.retiro.store');
Route::get('retiro/delete/{retiro}','RetiroController@delete')->name('admin.retiro.delete');

