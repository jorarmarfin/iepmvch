<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalGrado extends Model
{
    protected $table = 'personal_grado';
    protected $guarded = [];
    public $timestamps = false;
    /**
    * Atributos Grado
    */
    public function getGradoAttribute()
    {
    	$gradoseccion = GradoSeccion::where('id',$this->idgrado)->first();
    	$grado = Grado::where('id',$gradoseccion->idgrado)->first();
    	return $grado->nombre;
    }
    /**
    * Atributos Personal
    */
    public function getPersonalAttribute()
    {
    	$personal = Personal::find($this->idpersonal);
    	return $personal->nombre_completo;
    }


}
