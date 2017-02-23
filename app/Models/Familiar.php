<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiar';
    protected $fillable = ['viveconestudiante', 'paterno', 'materno','nombres','dni','fechanacimiento','idpais','religion','idestadocivil','gradoinstruccion','profesion','direccion','celular','telefonofijo','telefonolaboral','email','idtipo','autorizo','idsexo','esapoderado','idubigeo'];

    /**
     * Atributos Email
     */
    public function setEmailAttribute($value)
    {
        $retVal = ($value=='PENDIENTE') ? $value.'-'.$this->id : $value ;
        if ($value=='PENDIENTE') {
          $lastfamily = Familiar::where('email','like','%pendiente%')->orderBy('email','desc')->first();
          if (isset($lastfamily)) {
            $numero = (int)substr($lastfamily->email, -4);
            $numero += 1;
            $retVal = 'PENDIENTE-'.pad($numero,4,'0','L');
          }else{
            $retVal = 'PENDIENTE-0000';
          }
        } else {
          $retVal = $value;
        }

        $this->attributes['email'] = strtolower($retVal);
    }
    /**
     * Atributos Paterno
     */
    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] = strtoupper($value);
    }
    /**
     * Atributos Materno
     */
    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] = strtoupper($value);
    }
    /**
     * Atributos Nombres
     */
    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = title_case($value);
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeFamilia($cadenaSQL,$idalumno){
    	$familia = AlumnoFamiliar::select('idfamiliar')->where('idalumno',$idalumno)->get();
    	return $cadenaSQL->wherein('id',$familia);
    }

    /**
     * Funcion para guardar los datos y referencias
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function Guardar($request)
    {
        $data = $request->all();
        $alumno = Alumno::find($data['idalumno']);

        if ($data['viveconestudiante']) {
            $data['idubigeo'] = $alumno->idubigeo;
            $data['direccion'] = $alumno->direccion;
        }

        $familiar = new Familiar();
        $familiar->fill($data);
        if($alumno->familiar()->save($familiar))
        return true;
        else return false;
    }
    /**
     * Funcion para eliminar los datos y referencias
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function Eliminar($id,$idalumno)
    {
        $familiar = Familiar::find($id);
        $familiar->alumnos()->detach();
        $familiar->delete();
    }
    /**
     * Funcion para eliminar los datos y referencias
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function Quitar($id,$idalumno)
    {
        $familiar = Familiar::find($id);
        $familiar->alumnos()->detach($idalumno);
    }
    /**
     * Funcion para Actualizar los datos y referencias
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function Actualizar($request,$id)
    {
        $data = $request->all();
        $familiar = Familiar::find($id);
        $familiar->fill($data);
        $familiar->save();
    }
    /**
    * Atributos nombre completo
    */
    public function getNombreCompletoAttribute()
    {
        $nombrecompleto = $this->paterno.' - '.$this->materno.', '.$this->nombres;
        return $nombrecompleto;
    }
    /**
    * Atributos Pais
    */
    public function getPaisAttribute()
    {
        $pais = Catalogo::find($this->idpais);
        return $pais->nombre;
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
    * Atributos Estado Civil
    */
    public function getEstadoCivilAttribute()
    {
        $estadocivil = Catalogo::find($this->idestadocivil);
        return $estadocivil->nombre;
    }
    /**
    * Atributos Tipo de Familiar
    */
    public function getTipoAttribute()
    {
        $tipo = Catalogo::find($this->idtipo);
        return $tipo->nombre;
    }
    /**
     * Relacion con la tabla Familia
     * de muchos a muchos
     * @return [type] [description]
     */
    public function Alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_familiar','idfamiliar','idalumno');
    }

}
