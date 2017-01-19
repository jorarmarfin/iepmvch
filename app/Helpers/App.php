<?php

use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
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
/**
 * Devuelve el id estado de catalogo
 */
if (! function_exists('UbigeoPersonal')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function UbigeoPersonal($seleccionar,$id)
    {
        $ubigeo = ['-1' => "Seleccionar $seleccionar"]+Catalogo::where('id',$id)->pluck('nombre','id')->toarray();

        return $ubigeo;
    }
}

/**
 * Devuelve el id del pais peru
 */
if (! function_exists('IdPeru')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IdPeru()
    {
        $paises = Catalogo::select('id')->table('PAIS')->where('nombre','PERÚ')->first();

        return $paises->id;
    }
}

/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('IdMasculino')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IdMasculino()
    {
        $sexo = Catalogo::select('id')->table('SEXO')->where('nombre','Masculino')->first();

        return $sexo->id;
    }
}

/**
 * Devuelve el id del sexo masculino
 */
if (! function_exists('NombreAlumno')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function NombreAlumno($id)
    {
        $alumno = Alumno::find($id);

        return $alumno->nombre_completo;
    }
}
/**
 * Devuelve el id del alumno con el id familiar
 */
if (! function_exists('IdAlumno')) {
    /**
     * Funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function IdAlumno($id)
    {
        $alumno = AlumnoFamiliar::where('idfamiliar',$id)->first();

        return $alumno->id;
    }
}