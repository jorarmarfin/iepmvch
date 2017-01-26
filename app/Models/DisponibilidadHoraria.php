<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadHoraria extends Model
{
    protected $table = 'disponibilidad_horaria';
    protected $fillable = ['idpersonal', 'iddia', 'inicio','fin'];
    public $timestamps = false;


    /**
    * Atributos Personal
    */
    public function getPersonalAttribute()
    {
    	$personal = Personal::find($this->idpersonal);
    	return $personal->paterno.' - '.$personal->materno.', '.$personal->nombres;
    }
    /**
    * Atributos Dia
    */
    public function getDiaAttribute()
    {
    	$dia = Catalogo::find($this->iddia);
    	return $dia->nombre;
    }
    /**
     * Devuelve el horario de los psicologos
     * @return [type] [description]
     */
   /* public static function horariopsicologo()
    {
        $idtipo = EstadoId('TIPO PERSONAL','Psicologo');
        $personal = Personal::select('id')->where('idtipo',$idtipo)->get();
    }*/
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeHorarioPsicologico($cadenaSQL){
        $idtipo = EstadoId('TIPO PERSONAL','Psicologo');
        $personal = Personal::select('id')->where('idtipo',$idtipo)->get();

        return $cadenaSQL->wherein('idpersonal',$personal);
    }
}
