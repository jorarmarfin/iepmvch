<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';
    protected $fillable = ['idalumno', 'idgradoseccion', 'idtipo','year','retiro_solo','retiro_hermano','retiro_hermano_nombre','created_at'];

    /**
    * Atributos Fecha Matricula
    */
    public function getFechaMatriculaAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->format('Y-m-d');
    }
    /**
    * Atributos Se retira con su hermano
    */
    public function getSeRetiraHermanoAttribute()
    {
        $retval = ($this->retiro_hermano)?'Si ('.$this->retiro_hermano_nombre.')':'No';
        return $retval;
    }
    /**
    * Atributos Se retira Solo
    */
    public function getSeRetiraSoloAttribute()
    {
        $retval = ($this->retiro_solo)? 'Si':'No';
        return $retval;
    }

    /**
    * Atributos Alumno
    */
    public function getAlumnoAttribute()
    {
        $alumno = Alumno::find($this->idalumno);
        return $alumno;
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
    * Atributos Grado
    */
    public function getGradoMatriculadoAttribute()
    {
        $gradoseccion = GradoSeccion::select('idgrado')
                                        ->where('id',$this->idgradoseccion)
                                        ->first();
        $grado = Grado::find($gradoseccion->idgrado);
        return $grado->nombre;
    }
    /**
    * Atributos Nivel
    */
    public function getNivelMatriculadoAttribute()
    {
        $gradoseccion = GradoSeccion::select('idgrado')
                                        ->where('id',$this->idgradoseccion)
                                        ->first();
        $grado = Grado::find($gradoseccion->idgrado);
        $nivel = Catalogo::find($grado->idnivel);
        return $nivel->nombre;
    }
    /**
     * Guarda una matricula
     * @param [type] $request [description]
     */
    public static function Guardar($request)
    {
        $data = $request->all();
        $data['year'] = Carbon::now()->year;
        $sw = Matricula::select('id')
                        ->where('idalumno',$data['idalumno'])
                        ->where('idgradoseccion',$data['idgradoseccion'])
                        ->where('idtipo',$data['idtipo'])
                        ->where('year',$data['year'])
                        ->first();
        if(isset($sw)){
            return false;
        }
        else{
            $matricula = Matricula::create($data);
            $alumno = Alumno::find($matricula->idalumno);
            $alumno->idestado = EstadoId('ESTADO ALUMNO','Matriculado');
            $alumno->save();

            return true;
        }
    }
    /**
     * Actualiza una matricula
     * @param [type] $request [description]
     */
    public static function Actualizar($request)
    {
        $data = $request->all();

        $data['year'] = Carbon::now()->year;
        $sw = Matricula::select('id')
                        ->where('idalumno',$data['idalumno'])
                        ->where('idgradoseccion',$data['idgradoseccion'])
                        ->where('idtipo',$data['idtipo'])
                        ->where('year',$data['year'])
                        ->first();
        if(isset($sw)){
            return false;
        }
        else{
            Matricula::create($data);
            return true;
        }
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeActivas($cadenaSQL){
        return $cadenaSQL->select('matricula.id','a.paterno','a.materno','a.nombres','a.foto','g.nombre as grado','matricula.year','matricula.idtipo','n.nombre as nivel','matricula.idalumno','g.id as idgrado','matricula.created_at')
                         ->join('alumno as a','a.id','=','idalumno')
                         ->join('grado_seccion as gs','gs.id','=','idgradoseccion')
                         ->join('grado as g','g.id','=','gs.idgrado')
                         ->join('catalogo as n','n.id','=','g.idnivel');
    }
    /**
     * Resumen de matricula
     */
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeResumen($cadenaSQL){
        return $cadenaSQL->select('g.id','idgradoseccion',\DB::raw('count(*) as total'))
                         ->join('grado_seccion as gs','gs.id','=','matricula.idgradoseccion')
                         ->join('grado as g','g.id','=','gs.idgrado')
                         ->where('idtipo','<>',EstadoId('TIPO MATRICULA','Retirada'))
                         ->groupBy('g.id')
                         ->groupBy('idgradoseccion');
    }

}