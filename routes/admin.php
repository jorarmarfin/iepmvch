<?php

Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {
	require __DIR__.'/admin/admin.route.php';
	require __DIR__.'/admin/matricula.route.php';
	require __DIR__.'/admin/reservapsicologica.route.php';
	require __DIR__.'/admin/alumno.route.php';
	require __DIR__.'/admin/personal.route.php';
	require __DIR__.'/admin/familiar.route.php';


	require __DIR__.'/admin/asignatura.route.php';



});