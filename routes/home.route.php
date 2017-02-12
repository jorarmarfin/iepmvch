<?php

Route::get('/', [
 'uses' => 'HomeController@index',
 'as' => 'home.index'
]);
Route::get('/psicologo', [
 'uses' => 'HomeController@psicologo',
 'as' => 'psicologo.index'
]);

