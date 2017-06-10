<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccion extends Model
{
    protected $table = 'grado_seccion';
    protected $fillable = ['idgrado', 'idseccion','cantidad'];
    public $timestamps = false;
    /**
    * Atributos Nivel
    */
    public function getIdNivelAttribute()
    {
      $grado = Grado::find($this->idgrado);
      $nivel = Catalogo::find($grado->idnivel);
      return $nivel->id;
    }
    /**
    * Atributos Nivel
    */
    public function getNivelAttribute()
    {
      $grado = Grado::find($this->idgrado);
      $nivel = Catalogo::find($grado->idnivel);
      return $nivel->nombre;
    }
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
