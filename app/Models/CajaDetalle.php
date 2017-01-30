<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CajaDetalle extends Model
{
    protected $table = 'caja_detalle';
    protected $fillable = ['idcaja', 'cantidad', 'idtipoentrada','idtipoigv','idtipodocumento','preciounitario','subtotal','total'];
}
