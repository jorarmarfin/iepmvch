<?php

Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {
	require __DIR__.'/admin/admin.route.php';
	require __DIR__.'/admin/alumno.route.php';
	require __DIR__.'/admin/personal.route.php';
	require __DIR__.'/admin/familiar.route.php';
	/**
	 * Rutas de Matricula
	 */
	require __DIR__.'/admin/matricula.route.php';
	require __DIR__.'/admin/reservapsicologica.route.php';
	require __DIR__.'/admin/checklist.route.php';
	require __DIR__.'/admin/hermanos.route.php';
	/**
	 * Rutas de Plan Curricular
	 */
	require __DIR__.'/admin/asignatura.route.php';
	/**
	 * Boleta de venta
	 */
	require __DIR__.'/admin/boletaventa.route.php';
	require __DIR__.'/admin/productos.route.php';
	require __DIR__.'/admin/serie.route.php';



});