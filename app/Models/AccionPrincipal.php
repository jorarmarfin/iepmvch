<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccionPrincipal extends Model
{
    protected $table = 'accion_principal';
    protected $fillable = ['nombre', 'activo'];
}
