<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $fillable = ['nombre', 'idum','precio'];

    /**
    * Atributos Unidad Medida
    */
    public function getUnidadMedidaAttribute()
    {
    	$um = Catalogo::find($this->idum);
    	return $um->nombre;
    }
    /**
    * Atributos Codigo Unidad Medida
    */
    public function getCodigoUnidadMedidaAttribute()
    {
        $um = Catalogo::find($this->idum);
        return $um->codigo;
    }
}
