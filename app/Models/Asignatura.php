<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $fillable = ['nombre', 'idareaacademica','peso'];


    /**
    * Atributos Area
    */
    public function getAreaAttribute()
    {
    	$area = AreaAcademica::find($this->idareaacademica);
    	return $area;
    }
}
