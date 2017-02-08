<?php

Route::get('hermanos/{hermanos}','HermanosController@show')->name('admin.hermanos.show');
Route::get('hermanos/delete/{hermanos}','HermanosController@delete')->name('admin.hermanos.delete');
Route::post('hermanos/','HermanosController@store')->name('admin.hermanos.store');

