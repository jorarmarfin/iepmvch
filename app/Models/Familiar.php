<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiar';
    protected $fillable = ['viveconestudiante', 'paterno', 'materno','nombres','dni','fechanacimiento','idpais','idubigeonacimiento','religion','idestadocivil','gradoinstruccion','profesion','direccion','celular','telefonofijo','telefonolaboral','email','idtipo','autorizo','idsexo','esapoderado'];
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

        $familiar = new Familiar();
        $familiar->fill($data);
        //dd($data);
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
