<?php

use App\Models\Catalogo;
if (! function_exists('RoleId')) {
	/**
	 * Funcion que retorna el prefijo para nombres de archivos
	 * @return [type] [description]
	 */
    function RoleId($name)
    {
    	$role = Catalogo::select('id')->table('ROLES')->where('codigo',$name)->first();
        return $role->id;
    }
}
/**
 * Devuelve el id estado de catalogo
 */
if (! function_exists('EstadoId')) {
	/**
	 * Funcion que retorna el prefijo para nombres de archivos
	 * @return [type] [description]
	 */
    function EstadoId($table,$name)
    {
    	$role = Catalogo::select('id')->table($table)->where('nombre',$name)->first();
        return $role->id;
    }
}