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
	require __DIR__.'/admin/retiro.route.php';
	/**
	 * Rutas de Plan Curricular
	 */
	require __DIR__.'/admin/areaacademica.route.php';
	require __DIR__.'/admin/asignatura.route.php';
	require __DIR__.'/admin/asignaturagradoseccion.route.php';
	require __DIR__.'/admin/personalasignatura.route.php';
	/**
	 * Boleta de venta
	 */
	require __DIR__.'/admin/boletaventa.route.php';
	require __DIR__.'/admin/productos.route.php';
	require __DIR__.'/admin/serie.route.php';
	/**
	 * Lista de Utiles
	 */
	require __DIR__.'/admin/listautiles.route.php';
	/**
	 * Registro de asistencia
	 */
	require __DIR__.'/admin/asistencia.route.php';
	/**
	 * Cumpleaños
	 */
	require __DIR__.'/admin/birthday.route.php';
	/**
	 * Notas
	 */
	require __DIR__.'/admin/notas.route.php';





});