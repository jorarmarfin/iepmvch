<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro';
    protected $guarded = [];
    public $timestamps = false;

    /**
    * Atributos Nota Trimestral 01
    */
    public function getNotaTrimestral1Attribute()
    {
        $matricula = Matricula::find($this->idmatricula);
        $gradoseccion = GradoSeccion::find($matricula->idgradoseccion);
        if ($gradoseccion->nivel == 'Inicial') {
            $etiqueta = EtiquetaNota::NotaLiteral($gradoseccion->id_nivel,$this->p_t_1);
        } else {
            $etiqueta = $this->p_t_1;
        }

        return $etiqueta;
    }
    /**
    * Atributos Nota Trimestral 02
    */
    public function getNotaTrimestral2Attribute()
    {
        $matricula = Matricula::find($this->idmatricula);
        $gradoseccion = GradoSeccion::find($matricula->idgradoseccion);

        if ($gradoseccion->nivel == 'Inicial') {
            $etiqueta = EtiquetaNota::NotaLiteral($gradoseccion->id_nivel,$this->p_t_2);
        } else {
            $etiqueta = $this->p_t_2;
        }

        return $etiqueta;
    }
    /**
    * Atributos Nota Trimestral 03
    */
    public function getNotaTrimestral3Attribute()
    {
        $matricula = Matricula::find($this->idmatricula);
        $gradoseccion = GradoSeccion::find($matricula->idgradoseccion);

        if ($gradoseccion->nivel == 'Inicial') {
            $etiqueta = EtiquetaNota::NotaLiteral($gradoseccion->id_nivel,$this->p_t_3);
        } else {
            $etiqueta = $this->p_t_3;
        }

        return $etiqueta;
    }

    /**
    * Atributos Periodo academico
    */
    public function getPeriodoAcademicoAttribute()
    {
        $periodo = Catalogo::find($this->idperiodoacademico);
        return $periodo->nombre;
    }
    /**
    * Atributos Personal
    */
    public function getPersonalAttribute()
    {
        $personalasignatura = PersonalAsignatura::find($this->idpersonalasignatura);

        return $personalasignatura->nombre_personal;
    }
    /**
    * Atributos Asignatura
    */
    public function getAsignaturaAttribute()
    {
        $personalasignatura = PersonalAsignatura::find($this->idpersonalasignatura);

        return $personalasignatura->nombre_asignatura;
    }
    /**
    * Atributos Area
    */
    public function getAreaAttribute()
    {
        $personalasignatura = PersonalAsignatura::find($this->idpersonalasignatura);

        return $personalasignatura->nombre_area;
    }
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
