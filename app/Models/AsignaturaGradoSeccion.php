<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGradoSeccion extends Model
{
    protected $table = 'asignatura_grado_seccion';
    protected $fillable = ['idgradoseccion', 'idasignatura', 'acti','practicas'];
}
