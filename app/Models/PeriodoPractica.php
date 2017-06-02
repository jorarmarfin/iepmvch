<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodoPractica extends Model
{
    protected $table = 'periodo_practica';
    protected $guaded = [];
    public $timestamps = false;
    /**
    * Atributos Periodo Academico
    */
    public function getPeriodoAcademicoAttribute()
    {
    	$periodo = Catalogo::find($this->idperiodoacademico);
    	return $periodo->nombre;
    }
}
