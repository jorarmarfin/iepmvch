<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendario';
    protected $fillable = ['fecha', 'hora', 'asunto','descripcion','activo'];
}
