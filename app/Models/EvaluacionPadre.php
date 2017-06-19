<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionPadre extends Model
{
    protected $table = 'evaluacion_padre';
    protected $guarded = [];
    public $timestamps = false;
    /**
    * Atributos Matricula
    */
    public function getMatriculaAttribute()
    {
    	$matricula = Matricula::find($this->idmatricula);
    	return $matricula;
    }
    /**
    * Atributos Periodo Academico
    */
    public function getPeriodoAcademicoAttribute()
    {
    	$periodo = Catalogo::find($this->idperiodoacademico);
    	return $periodo;
    }
}
