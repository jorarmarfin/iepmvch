<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    protected $table = 'comportamiento';
    protected $guarded = [];
    public $timestamps = false;
    /**
    * Atributos Alumno
    */
    public function getMatriculaAttribute()
    {
        $matricula = Matricula::find($this->idmatricula);
        return $matricula;
    }
}
