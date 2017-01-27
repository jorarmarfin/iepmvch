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
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeHorarioPsicologico($cadenaSQL){
        $idtipo = EstadoId('TIPO PERSONAL','Psicologo');
        $personal = Personal::select('id')->where('idtipo',$idtipo)->get();

        return $cadenaSQL->wherein('idpersonal',$personal);
    }
    /**
     * Retorna los dias disponibles del psicologo escogido
     * @param  [type] $cadenaSQL [description]
     * @param  [type] $data      [description]
     * @return [type]            [description]
     */
    public function scopeRetornaDias($cadenaSQL,$data)
    {
        return $cadenaSQL->select('d.valor as dias')
                ->join('catalogo as d','d.id','=','iddia')
                ->where('idpersonal',$data['idpersonal'])
                ->groupBy('d.valor')
                ->get()->implode('dias',',');
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeRetornoHoras($cadenaSQL,$date){
        return $cadenaSQL->where('inicio','<=',$date->toTimeString())
                            ->where('fin','>',$date->toTimeString())
                            ->get();
    }
}
