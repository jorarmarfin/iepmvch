<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PersonalAsignatura extends Model
{
    protected $table = 'personal_asignatura';
    protected $fillable = ['idpersonal', 'idasignaturagradoseccion', 'tutor','notas'];
    /**
    * Atributos Nombre de grado
    */
    public function getNombreGradoAttribute()
    {
        $ags = AsignaturaGradoSeccion::find($this->idasignaturagradoseccion);
        return $ags->grado;
    }
    /**
    * Atributos Personal
    */
    public function getNombrePersonalAttribute()
    {
    	$personal = Personal::find($this->idpersonal);
        if(is_null($personal))$personal = new PersonalAsignatura(['nombre_completo'=>'---']);
    	return $personal->nombre_completo;
    }
    /**
    * Atributos Asignatura
    */
    public function getNombreAsignaturaAttribute()
    {
        $ags = AsignaturaGradoSeccion::find($this->idasignaturagradoseccion);
        $asignatura = Asignatura::find($ags->idasignatura);
        if (is_null($asignatura)) {
            $asignatura = new Asignatura(['nombre'=>'--']);
        }

        return $asignatura->nombre;
    }
    /**
    * Atributos Asignatura
    */
    public function getNombreAreaAttribute()
    {
    	$ags = AsignaturaGradoSeccion::find($this->idasignaturagradoseccion);
    	$area = AreaAcademica::find($ags->idarea);

    	return $area->nombre;
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeAsignaturas($cadenaSQL){
        $idusuario = Auth::user()->id;
        $personal = Personal::select('id')->where('idusuario',$idusuario)->first();
        return $cadenaSQL->where('idpersonal',$personal->id);
    }
}
