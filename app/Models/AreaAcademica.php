<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaAcademica extends Model
{
    protected $table = 'area_academica';
    protected $fillable = ['codigo', 'nombre','inicial', 'primaria','secundaria','subarea','activo'];


    /**
    * Atributos Subarea
    */
    public function getTieneSubAreaAttribute()
    {
        if ($this->subarea) return 'SI';
        else return 'NO';
    }
    /**
    * Atributos Activo
    */
    public function getEsActivoAttribute()
    {
    	if ($this->activo) return 'SI';
    	else return 'NO';
    }

}
