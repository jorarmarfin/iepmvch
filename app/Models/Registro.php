<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro';
    protected $guarded = [];
    public $timestamps = false;
    /**
    * Atributos Datos de Matricula
    */
    public function getAlumnoAttribute()
    {
    	$matricula = Matricula::find($this->idmatricula);
    	return $matricula->alumno;
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopePractica($cadenaSQL,$ags,$periodo){
    	return $cadenaSQL->where('idperiodoacademico',$ags)
    					 ->where('idpersonalasignatura',$periodo);
    }
}
