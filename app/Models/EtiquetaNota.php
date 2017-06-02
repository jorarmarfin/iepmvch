<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiquetaNota extends Model
{
    protected $table = 'etiqueta_nota';
    protected $guarded = [];

    public static function NotaLiteral($nivel,$nota)
    {
    	if ($nota == 'NP') {
    		return $nota;
    	} else {
    		$nota = (int)$nota;
	    	$etiqueta = EtiquetaNota::select('id')->where('idnivel',$nivel)->get();

	    	$valor = EtiquetaNotaDetalle::whereIn('idetiquetanota',$etiqueta->toArray())
	    								  ->where('nota',$nota)->first();
	    	if(is_null($valor)) $valor = New EtiquetaNotaDetalle(['literal'=>'--']);

	    	return $valor->literal;
    	}
    }
}
