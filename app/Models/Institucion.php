<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'institucion';
    protected $fillable = ['nombre','razonsocial','resolucion', 'direccion', 'idubigeo','director','telefonos','email','web','ruc'];
}
