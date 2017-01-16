<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $fillable = ['paterno', 'materno', 'nombres','dni','idgrado','fechanacimiento','idubigeonacimiento','idpais','religion','bautismo','comunion','confirmacion','idubigeo','direccion','telefonos','telefonoemergencia1','telefonoemergencia2','responsableeconomico','colegioprocedencia','esespecial','discapacidad','idestado','observacion'];

    /**
     * Atributos de la clase Alumno
     */
    public function getGradoAttribute()
    {
    	$grado = Grado::find($this->idgrado);
        return $grado->nombre;
    }
   	/**
   	* Atributos de la clase Alumno
   	*/
   	public function getEstadoAttribute()
   	{
   	$estado = Catalogo::find($this->idestado);
   	return $estado->nombre;
   	}





}
