<?php

Route::resource('personal', 'PersonalController',['names'=>'admin.personal']);
Route::get('personal/delete/{personal}','PersonalController@delete')->name('admin.personal.delete');





