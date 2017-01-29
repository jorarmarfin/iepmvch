<?php

//Route::resource('checklist', 'CheckListController',['names'=>'admin.checklist']);

Route::get('checklist/{checklist}','CheckListController@show')->name('admin.checklist.show');
Route::get('admin/checklist/{checklist}/edit','CheckListController@edit')->name('admin.checklist.edit');
Route::get('checklist/entrego/{entrego}/{id}','CheckListController@entrego')->name('admin.checklist.entrego');


