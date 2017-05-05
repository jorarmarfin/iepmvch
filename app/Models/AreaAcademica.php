<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaAcademica extends Model
{
    protected $table = 'area_academica';
    protected $fillable = ['codigo', 'nombre','inicial', 'primaria','secundaria','activo'];
}
