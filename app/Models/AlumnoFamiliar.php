<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoFamiliar extends Model
{
    protected $table = 'alumno_familiar';
    protected $fillable = ['idalumno', 'idfamiliar'];
    public $timestamps = false;

    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeRelacionados($cadenaSQL,$idfamiliar,$idalumno){
    	return $cadenaSQL->select('idalumno')
    					 ->where('idfamiliar',$idfamiliar)
    					 ->where('idalumno','<>',$idalumno);
    }

}
