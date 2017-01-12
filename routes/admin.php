<?php

Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {
	require __DIR__.'/admin/admin.route.php';
	require __DIR__.'/admin/matricula.route.php';
	require __DIR__.'/admin/reservapsicologica.route.php';
});