<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiar';
    protected $fillable = ['viveconestudiante', 'paterno', 'materno','nombres','dni','fechanacimiento','idpais','idubigeonacimiento','religion','idestadocivil','gradoinstruccion','profesion','direccion','celular','telefonofijo','telefonolaboral','email','idtipo','autorizo','idsexo','esapoderado'];
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeFamilia($cadenaSQL,$idalumno){
    	$familia = AlumnoFamiliar::select('idfamiliar')->where('idalumno',$idalumno)->get();
    	return $cadenaSQL->wherein('id',$familia);
    }

}
