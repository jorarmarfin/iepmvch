<?php
Route::group(['prefix' => 'padres','middleware'=>'auth','namespace'=>'Padres'], function() {
	Route::resource('agenda', 'AgendaController',['names'=>'padres.agenda']);

});
