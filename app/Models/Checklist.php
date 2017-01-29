<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Checklist extends Model
{
    protected $table = 'checklist';
    protected $fillable = ['idmatricula', 'aplica', 'idrequisito','fecha','idusuario','activo'];
    public $timestamps = false;

    /**
    * Atributos Alumno
    */
    public function getAlumnoAttribute()
    {
    	$matricula = Matricula::select('idalumno')->where('id',$this->idmatricula)->first();
    	$alumno = Alumno::find($matricula->idalumno);
    	return $alumno;
    }
    /**
    * Atributos Alumno
    */
    public function getMatriculaAttribute()
    {
    	$matricula = Matricula::where('id',$this->idmatricula)->first();
    	return $matricula;
    }
    /**
    * Atributos Requisito
    */
    public function getRequisitoAttribute()
    {
    	$requisito = Catalogo::find($this->idrequisito);
    	return $requisito->descripcion;
    }
    /**
    * Atributos Requisito
    */
    public function getSiAplicaAttribute()
    {
    	if($this->aplica) return '<a href="'.route('admin.checklist.edit',$this->id).'" class="label label-sm label-info"> SI </a>';
    	else return '<a href="'.route('admin.checklist.edit',$this->id).'" class="label label-sm label-danger"> NO </a>';
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeActivo($cadenaSQL){
    	return $cadenaSQL->where('activo',1);
    }
    /**
     * Genera los requisitos de matricula del alumno
     * @param [type] $id [description]
     */
    public static function GeneraCheklist($id)
    {
    	/*$sw = Checklist::where('idmatricula',$id)->count();*/
    	$sw = Checklist::where('idmatricula',$id)->count();
    	if($sw==0){
    		$requisitos = Catalogo::select('id as idrequisito',DB::raw("$id as idmatricula"))
                        ->table('REQUISITOS')->Activo()
                        ->OrderBy('id')->get();
        	Checklist::insert($requisitos->toArray());
    	}
    }
}
