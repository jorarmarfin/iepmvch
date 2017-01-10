<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicador';
    protected $fillable = ['nombre', 'idcompetencia', 'idperiodoacademico','idasignaturagradoseccion','orden','activo'];
}
