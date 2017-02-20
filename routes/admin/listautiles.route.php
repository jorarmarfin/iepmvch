<?php

Route::get('lista-utiles/','ListaUtilesController@index')->name('admin.listautiles.index');
Route::post('lista-utiles/','ListaUtilesController@store')->name('admin.listautiles.store');
Route::get('lista-utiles/delete/{lista}','ListaUtilesController@delete')->name('admin.listautiles.delete');



