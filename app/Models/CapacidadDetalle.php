<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapacidadDetalle extends Model
{
    protected $table = 'capacidad_detalle';
    protected $guarded = [];
    public $timestamps = false;
    /**
     * Atributos de la clase Users
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'UTF-8');
    }
}
