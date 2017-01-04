<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiquetaNotaDetalle extends Model
{
    protected $table = 'etiqueta_nota_detalle';
    protected $fillable = ['idetiquetanota', 'nota', 'literal'];
}
