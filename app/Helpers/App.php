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