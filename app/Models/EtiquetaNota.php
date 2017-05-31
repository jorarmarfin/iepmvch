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
	    	$etiqueta = EtiquetaNota::where('idnivel',$nivel)->first();

	    	$valor = EtiquetaNotaDetalle::where('idetiquetanota',$etiqueta->id)
	    								  ->where('nota',$nota)->first();
	    	if(is_null($valor)) $valor = New EtiquetaNotaDetalle(['literal'=>'--']);

	    	return $valor->literal;
    	}
    }
}
