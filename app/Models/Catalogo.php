<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table = 'catalogo';
    protected $fillable = ['idtable', 'iditem', 'codigo','nombre','descripcion','valor','activo'];
    // public $timestamps = false;
    #####################################################################
	public function Maestro($NameTable){
		$data=$this->select('iditem')
				   ->where('idtable',0)
			       ->where('nombre',"$NameTable")->first();
		return $data->iditem;
	}
	#--------------------------------------------------------------------
	public function scopeCombo($cadenaSQL,$NameTable){
		$idtable=$this->Maestro($NameTable);
		return $cadenaSQL->where('idtable',$idtable)
						 ->where('activo',1)
						 ->orderBy('nombre');
	}
	#--------------------------------------------------------------------
	public function scopeIdCatalogo($cadenaSQL,$NameTable,$NameSubTable){
		$idtable=$this->Maestro($NameTable);
		return $cadenaSQL->where('idtable',$idtable)
						 ->where('nombre',$NameSubTable)
						 ->where('activo',1)->lists('id')[0];
	}
	 #--------------------------------------------------------------------
    public function scopeTable($cadenaSQL,$NameTable){
        $NameTable = strtoupper($NameTable);
        $idtable=$this->Maestro($NameTable);
        return $cadenaSQL->where('idtable',$idtable)
                         ->orderBy('iditem','asc');
    }
    #--------------------------------------------------------------------
    public function scopeIdtable($cadenaSQL,$NameTable){
        $NameTable = strtoupper($NameTable);
        return $cadenaSQL->select('iditem')
                         ->where('idtable',0)
                         ->where('nombre',"$NameTable")
                         ->where('activo',1)
                         ->first();
    }
    #--------------------------------------------------------------------
	public function scopeidroot($cadenaSQL){
		return $cadenaSQL->select('id')->where('codigo','root')->where('nombre','root')->first();
	}
	/**
	 * Devuelve la tabla del Catalogo
	 * @param  [string] $cadenaSQL [cadena de ejecucion]
	 * @param  [strin] $NameTable [nombre de la tabla]
	 * @return [type]            [description]
	 */
	public function scopeUbigeo($cadenaSQL,$Name=null){
		$idtable=$this->Maestro('UBIGEO');
		$raw1 = \DB::raw("SUBSTRING(codigo,5,2)");
		if (isset($Name)) {
			return $cadenaSQL->select('id','descripcion as text')->where('idtable',$idtable)
						 ->where($raw1,'<>','00')
						 ->where('descripcion','like',"%$Name%")
						 ->orderBy('descripcion')
						 ->get();
		}else{
			return $cadenaSQL->select('id','descripcion as text')->where('idtable',$idtable)->get();
		}

	}
}
