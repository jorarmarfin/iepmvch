<?php
Route::group(['namespace'=>'Birthday'], function() {
	Route::get('birthday','BirthdayController@index')->name('admin.birthday.index');
});



