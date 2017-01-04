<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaAutorizada extends Model
{
    protected $table = 'persona_autorizada';
    protected $fillable = ['nombre', 'dni', 'telefono','idalumno','idparentesco'];
}
