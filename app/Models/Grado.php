<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $fillable = ['idnivel', 'ciclo', 'codigo', 'nombre','activo'];
    /**
     * Devuelve los valores Activos
     * @param  [type] $cadenaSQL [description]
     * @return [type]            [description]
     */
    public function scopeActivo($cadenaSQL){
    	return $cadenaSQL->where('activo',1);
    }
}
