<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia';
    protected $fillable = ['idmatricula', 'idasignaturagradoseccion', 'idestado','fecha'];
    public $timestamps = false;
    /**
    * Atributos Alumno
    */
    public function getAlumnoAttribute()
    {
    	$matricula = Matricula::find($this->idmatricula);
    	$alumno = Alumno::find($matricula->idalumno);
    	return $alumno;
    }
    /**
    * Atributos Estado
    */
    public function getEstadoAttribute()
    {
    	$estado = Catalogo::find($this->idestado);
    	$retVal = (isset($estado)) ? $estado->nombre : '' ;
    	return $retVal;
    }
    /**
    * Atributos estado de  Alumno
    */
    public function getEstadoLayoutAttribute()
    {
      $estado = Catalogo::find($this->idestado);
      $retVal = (isset($estado)) ? $estado->nombre : 'b' ;
      switch ($retVal) {
        case 'Asistio':
           return '<span class="label label-sm label-success"> '.$estado->nombre.' </span>';
          break;
        case 'Falto':
           return '<span class="label label-sm label-danger"> '.$estado->nombre.' </span>';
          break;
        case 'Tardanza':
           return '<span class="label label-sm label-warning"> '.$estado->nombre.' </span>';
          break;
        case 'Tardanza/justificada':
           return '<span class="label label-sm label-info"> '.$estado->nombre.' </span>';
          break;

        default:
           return '';
          break;
      }
    }


}
