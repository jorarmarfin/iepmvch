<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccion extends Model
{
    protected $table = 'grado_seccion';
    protected $fillable = ['idgrado', 'idseccion','cantidad'];
    public $timestamps = false;

    /**
    * Atributos Grado
    */
    public function getGradoAttribute()
    {
      $grado = Grado::find($this->idgrado);
      return $grado->nombre;
    }
    /**
   	* Devuelve los valores Activos
   	* @param  [type]  [description]
   	* @return [type]            [description]
   	*/
   	public function scopeGradoSeccionAutorizado($cadenaSQL,$request){
   		$alumno = Alumno::find($request->input('idalumno'));
   		$idgrado = ($alumno->Estado=='Repite') ? $alumno->idgrado : $alumno->idgrado+1 ;

   		return $cadenaSQL->select('id')->where('idgrado',$idgrado);
   	}
}
