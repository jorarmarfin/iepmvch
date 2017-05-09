<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGradoSeccion extends Model
{
    protected $table = 'asignatura_grado_seccion';
    protected $fillable = ['idgradoseccion', 'idarea','idasignatura','practicas', 'activo'];

    /**
    * Atributos Area
    */
    public function getNombreAreaAttribute()
    {
        $area = AreaAcademica::where('id',$this->idarea)->first();
        return $area->nombre;
    }
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
        if (isset($asignatura)) {
           return $asignatura->nombre;
        } else {
            $asignatura = new Asignatura(['nombre'=>'']);
    	   return $asignatura->nombre;
        }
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeObtenGrado($cadenaSQL,$idgradoseccion){
        return $cadenaSQL->select('asignatura_grado_seccion.id','a.nombre as text')
                         ->join('asignatura as a','a.id','=','asignatura_grado_seccion.idasignatura')
                         ->where('idgradoseccion',$idgradoseccion)
                         ->orderBy('a.nombre');
    }


}
