<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
      if (isset($this->idubigeonacimiento)){
        $ubigeo = Catalogo::find($this->idubigeonacimiento);
        $ubigeo = $ubigeo->descripcion;
      }else $ubigeo = '';

      return $ubigeo;
    }
    /**
    * Atributos Ubigeo de residencia
    */
    public function getUbigeoAttribute()
    {
      if (isset($this->idubigeo)){
        $ubigeo = Catalogo::find($this->idubigeo);
        $ubigeo = $ubigeo->descripcion;
      }else $ubigeo = '';

      return $ubigeo;
    }
    /**
     * Guarda el registro
     * @param [type] $request [description]
     * @param [type] $id      [description]
     */
    public static function Guardar($request,$id)
    {
        $data = $request->all();
        $alumno = Alumno::findOrFail($id);
        $alumno->fill($data);

        if ($request->hasFile('file')) {
            if(!str_contains($personal->foto,'nofoto.jpg'))
                Storage::delete("/public/$alumno->foto");

            $alumno->foto = $request->file('file')->store('fotos','public');
        }
        if($alumno->save()) return true;
        else return false;

    }
    /**
     * Relacion con la tabla Familia
     * de muchos a muchos
     * @return [type] [description]
     */
    public function familiar()
    {
        return $this->belongsToMany(Familiar::class,'alumno_familiar','idalumno','idfamiliar');
    }
    /**
     * Relacion de one to many
     * Obtener la dependencia que tiene esta persona
     */
    public function Matricula()
    {
        return $this->hasmany(Matricula::class, 'id', 'idalumno');
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeAlfabetico($cadenaSQL){
      return $cadenaSQL->orderBy('paterno','asc')
                       ->orderBy('materno','asc')
                       ->orderBy('nombres','asc');
    }




}
