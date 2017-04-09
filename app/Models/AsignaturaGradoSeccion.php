<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGradoSeccion extends Model
{
    protected $table = 'asignatura_grado_seccion';
    protected $fillable = ['idgradoseccion', 'idasignatura','practicas', 'activo'];

    /**
    * Atributos Grado
    */
    public function getGradoAttribute()
    {
    	$gradoseccion = GradoSeccion::where('id',$this->idgradoseccion)->first();
    	$grado = Grado::where('id',$gradoseccion->idgrado)->first();
    	return $grado->nombre;
    }
    /**
    * Atributos Asignatura
    */
    public function getAsignaturaAttribute()
    {
    	$asignatura = Asignatura::find($this->idasignatura);
    	return $asignatura->nombre;
    }



}
