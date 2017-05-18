<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAsignatura extends Model
{
    protected $table = 'personal_asignatura';
    protected $fillable = ['idpersonal', 'idasignaturagradoseccion', 'tutor','notas'];
    /**
    * Atributos Personal
    */
    public function getNombrePersonalAttribute()
    {
    	$personal = Personal::find($this->idpersonal);
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
}
