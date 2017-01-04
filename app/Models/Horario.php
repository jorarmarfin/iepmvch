<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $fillable = ['numero', 'horainicio', 'horafin','idasignaturagrado','iddiasemana'];
}
