<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaAutorizada extends Model
{
    protected $table = 'persona_autorizada';
    protected $fillable = ['nombres', 'dni', 'telefono','idalumno','idparentesco'];
    /**
    * Atributos PArentesco
    */
    public function getParentescoAttribute()
    {
    	$parentesco = Catalogo::find($this->idparentesco);
    	return $parentesco->nombre;
    }
}
