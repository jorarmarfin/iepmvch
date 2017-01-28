<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $fillable = ['nombre', 'idarea','peso'];


    /**
    * Atributos Area
    */
    public function getAreaAttribute()
    {
    	$area = Catalogo::find($this->idarea);
    	return $area->nombre;
    }
}
