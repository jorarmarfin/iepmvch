<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $table = 'capacidad';
    protected $guarded = [];
    public $timestamps = false;
    /**
    * Atributos Periodo
    */
    public function getPeriodoAcademicoAttribute()
    {
    	$periodo = Catalogo::find($this->idperiodoacademico);
    	return $periodo->nombre;
    }
    /**
     * Atributos de la clase Users
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'UTF-8');
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeNombres($cadenaSQL,$practicaresumen){
        return $cadenaSQL->where('idperiodoacademico',$practicaresumen->idperiodoacademico)
                                ->where('idpersonalasignatura',$practicaresumen->idpersonalasignatura)
                                ->orderBy('id');
    }
}
