<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = ['llave','paterno', 'materno', 'nombres','dni','fechanacimiento','idpais','idubigeonacimiento','email','idestadocivil','numerohijos','idubigeo','direccion','telefonofijo','celular','universidad','culmino','carrera','idgestionuniversidad','gradoobtenido','fechaegreso','numerocolegiatura','idsistemapension','afp','vigente','llamadaatencion','memo','activo','idtipo','idsexo','foto','idusuario'];

    /**
    * Atributos Menu de usuario
    */
    public function getMenuAttribute()
    {
        $tipo = Catalogo::find($this->idtipo);
        switch ($tipo->codigo) {
            case 'Admin':
                $menu = 'menu.sider-admin';
                break;
            case 'Docen':
                $menu = 'menu.sider-doc';
                break;
            case 'Pisco':
                $menu = 'menu.sider-psi';
                break;
        }
        return $menu;
    }
    /**
    * Atributos Rol de usuario
    */
    public function getRolAttribute()
    {
        $tipo = Catalogo::find($this->idtipo);
        switch ($tipo->codigo) {
            case 'Admin':
                $codigo = 'adm';
                break;
            case 'Docen':
                $codigo = 'doc';
                break;
            case 'Pisco':
                $codigo = 'psi';
                break;
        }
        $rol = Catalogo::where('codigo',$codigo)->first();
        return $rol;
    }
    /**
    * Atributos Sistema Pension
    */
    public function getSistemaPensionAttribute()
    {
        $sistemapension = Catalogo::find($this->idsistemapension);
        return $sistemapension->nombre;
    }
    /**
    * Atributos Gestion Universidad
    */
    public function getGestionUniversidadAttribute()
    {
        $gestion = Catalogo::find($this->idgestionuniversidad);
        return $gestion->nombre;
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
    * Atributos Estado
    */
    public function getEstadoAttribute()
    {
        $estado = Catalogo::find($this->idestado);
        return $estado->nombre;
    }
    /**
    * Atributos Estado
    */
    public function getEstadoCivilAttribute()
    {
    	$estado = Catalogo::find($this->idestadocivil);
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
    * Atributos Pais del alumno
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
    * Atributos Edad del alumno
    */
    public function getEdadAttribute()
    {
        $edad = Carbon::createFromFormat('Y-m-d',$this->fechanacimiento)->age;
        return $edad;
    }
    /**
    * Atributos Tipo
    */
    public function getTipoAttribute()
    {
    	$tipo = Catalogo::find($this->idtipo);
    	return $tipo->nombre;
    }
    /**
    * Atributos Culmino carrera
    */
    public function getCulminoCarreraAttribute()
    {
        if($this->culmino)return 'Si';
        else return 'No';
    }
    /**
    * Atributos Vigencia de sistema de pension
    */
    public function getEsVigenteAttribute()
    {
        if($this->vigente)return 'Si';
        else return 'No';
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
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeActivo($cadenaSQL){
        return $cadenaSQL->where('activo',1);
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeInactivo($cadenaSQL){
        return $cadenaSQL->where('activo',0);
    }
}
