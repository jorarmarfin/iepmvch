<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $fillable = ['paterno', 'materno', 'nombres','dni','idgrado','fechanacimiento','idubigeonacimiento','idpais','religion','bautismo','comunion','confirmacion','idubigeo','direccion','telefonos','telefonoemergencia1','telefonoemergencia2','responsableeconomico','colegioprocedencia','esespecial','discapacidad','idestado','observacion','foto','idsexo'];

    /**
     * Atributos de la clase Alumno
     */
    public function getGradoAttribute()
    {
    	$grado = Grado::find($this->idgrado);
        return $grado->nombre;
    }
   	/**
    * Atributos estado de  Alumno
    */
    public function getEstadoAttribute()
    {
      $estado = Catalogo::find($this->idestado);
      return $estado->nombre;
    }
    /**
    * Atributos sexo de Alumno
    */
    public function getSexoAttribute()
    {
        $sexo = Catalogo::find($this->idsexo);
        return $sexo->nombre;
    }
    /**
    * Atributos nombre completo
    */
    public function getNombreCompletoAttribute()
    {
        $nombrecompleto = $this->paterno.'-'.$this->materno.','.$this->nombres;
        return $nombrecompleto;
    }
    /**
     * Atributos de la clase Users
     */
    /*public function setfechanacimientoAttribute($value)
    {
        if (isset($this->fechanacimiento) && $this->fechanacimiento!='') {
          $this->attributes['fechanacimiento'] = $value;
        }
    }*/
    /**
    * Atributos Edad del alumno
    */
    public function getEdadAttribute()
    {
        $edad = Carbon::createFromFormat('Y-m-d',$this->fechanacimiento)->age;
        return $edad;
    }
    /**
    * Atributos Pais del alumno
    */
    public function getPaisAttribute()
    {
      $pais = Catalogo::find($this->idpais);
      return $pais->nombre;
    }
    /**
    * Atributos Sacramentos del alumno
    */
    public function getSacramentosAttribute()
    {
      $sacramentos = '';
      if ($this->bautismo) {
        $sacramentos .= ' Bautismo';
      }
      if ($this->comunion) {
        $sacramentos .= ', Comunion';
      }
      if ($this->confirmacion) {
        $sacramentos .= ', Confirmacion';
      }
      return $sacramentos;

    }
    /**
    * Atributos Ubigeo de nacimiento
    */
    public function getUbigeoNacimientoAttribute()
    {
      $ubigeo = Catalogo::select('nombre','descripcion')->where('id',$this->idubigeonacimiento)->first();
      return $ubigeo;
    }
    /**
    * Atributos Ubigeo de residencia
    */
    public function getUbigeoAttribute()
    {
      $ubigeo = Catalogo::select('nombre','descripcion')->where('id',$this->idubigeo)->first();
      return $ubigeo;
    }






}
