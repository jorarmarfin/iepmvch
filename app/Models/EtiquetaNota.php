<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiquetaNota extends Model
{
    protected $table = 'etiquetanota';
    protected $fillable = ['idtable', 'iditem', 'codigo','nombre','descripcion','valor','activo'];
}
