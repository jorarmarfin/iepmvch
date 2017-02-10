<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaUtiles extends Model
{
    protected $table = 'lista_utiles';
    protected $fillable = ['idgrado', 'idmaterial', 'observacion'];

    /**
    * Atributos Grado
    */
    public function getGradoAttribute()
    {
    	$grado = Grado::find($this->idgrado);
    	return $grado->nombre;
    }
}
