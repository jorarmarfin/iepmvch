<?php

Route::group(['namespace'=>'Notas'], function() {
/**
 * Notas Trimestrales
 */
Route::get('notas','NotasController@index')->name('admin.notas.index');
Route::get('notas-trimestral-docente','TrimestralController@docente')->name('admin.notas.trimestral.docente');
#Route::put('retiro/{retiro}','RetiroController@update')->name('admin.retiro.update');
#Route::post('retiro/','RetiroController@store')->name('admin.retiro.store');
#Route::get('retiro/delete/{retiro}','RetiroController@delete')->name('admin.retiro.delete');

});
