<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoSeccion extends Model
{
    protected $table = 'grado_seccion';
    protected $fillable = ['idgrado', 'idseccion','cantidad'];
}
