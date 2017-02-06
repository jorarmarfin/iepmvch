<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CajaDetalle extends Model
{
    protected $table = 'caja_detalle';
    protected $fillable = ['idcaja', 'cantidad', 'idproducto','preciounitario','descuento','montoigv','idtipoigv','subtotal','total'];
    /**
    * Atributos Producto
    */
    public function getProductoAttribute()
    {
    	$producto = Producto::find($this->idproducto);
    	return $producto;
    }
    /**
    * Atributos Codigo de Afectacion
    */
    public function getCodigoAfectacionAttribute()
    {
    	$afectacion = Catalogo::find($this->idtipoigv);
    	return $afectacion->codigo;
    }

}
