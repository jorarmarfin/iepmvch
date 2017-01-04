<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccesoNota extends Model
{
    protected $table = 'acceso_nota';
    protected $fillable = ['idusuario', 'fechainicio', 'fechafinal','actvo'];
}
