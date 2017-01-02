<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaautorizada extends Model
{
    protected $table = 'personaautorizada';
    protected $fillable = ['nombre', 'dni', 'telefono','idalumno','idparentesco'];
}
