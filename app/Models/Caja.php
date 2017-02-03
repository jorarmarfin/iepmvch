<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Caja extends Model
{
    protected $table = 'caja';
    protected $fillable = ['idtipooperacion','fechaemision','idtipodocumento', 'ididentificacion', 'numidentificacion','razonsocial','idtipomoneda','total_gravado','total_inafecto','total_exonerado','total_venta','prefijo','serie','numero','idmatricula','entrada','salida','saldo','idigv'];

	/**
     * Atributos de la clase Caja
     */
    public function setNumeroAttribute($value)
    {
    	$numero = DB::select("SELECT nextval('$value')");
    	$numero = $numero[0]->nextval;
        $this->attributes['numero'] = $numero;
    }

}
