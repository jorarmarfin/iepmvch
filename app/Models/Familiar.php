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
    public static function Guardar($data)
    {
        $alumno = Alumno::find($data['idalumno']);

        $familiar = new Familiar();
        $familiar->fill($data);
        if($alumno->familiar()->save($familiar))
        return true;
        else return false;
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
        $ubigeo = Catalogo::find($this->idubigeonacimiento);
        return $ubigeo->descripcion;
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

}
