<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $fillable = ['idnivel', 'ciclo', 'codigo', 'nombre','activo'];
}
