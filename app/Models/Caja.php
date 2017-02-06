<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Caja extends Model
{
    protected $table = 'caja';
    protected $fillable = ['idtipooperacion','fechaemision','idtipodocumento', 'ididentificacion', 'numidentificacion','razonsocial','idtipomoneda','descuento_global','sumatoria_otros_cargos','total_descuentos','total_gravado','total_inafecto','total_exonerado','sumatoria_igv','sumatoria_isc','sumatoria_otros_tributos','total_venta','prefijo','serie','numero','idmatricula','entrada','salida','saldo','idigv','direccion'];

    /**
    * Atributos Archivo Cabecera
    */
    public function getArchivoCabeceraAttribute()
    {
        $filename = ruc().'-B'.pad($this->serie,3,0,'L').'-'.pad($this->numero,8,'0','L').'.cab';
        return $filename;
    }
    /**
    * Atributos Archivo Detalle
    */
    public function getArchivoDetalleAttribute()
    {
        $filename = ruc().'-B'.pad($this->serie,3,0,'L').'-'.pad($this->numero,8,'0','L').'.det';
        return $filename;
    }
    /**
    * Atributos Matricula
    */
    public function getMatriculaAttribute()
    {
        $matricula = Matricula::find($this->idmatricula);
        return $matricula;
    }
	/**
     * Atributos de la clase Caja
     */
    public function setNumeroAttribute($value)
    {
    	$numero = DB::select("SELECT nextval('$value')");
    	$numero = $numero[0]->nextval;
        $this->attributes['numero'] = $numero;
    }
    /**
    * Atributos Tipo Operacion
    */
    public function getCodigoOperacionAttribute()
    {
        $codigooperacion = Catalogo::find($this->idtipooperacion);
        return $codigooperacion->codigo;
    }
    /**
    * Atributos Tipo Documento
    */
    public function getCodigoDocumentoAttribute()
    {
        $codigodocumento = Catalogo::find($this->idtipodocumento);
        return $codigodocumento->codigo;
    }
    /**
    * Atributos Identificacion
    */
    public function getCodigoIdentificacionAttribute()
    {
        $Codigoidentificacion = Catalogo::find($this->ididentificacion);
        return $Codigoidentificacion->codigo;
    }
    /**
    * Atributos Tipo de moneda
    */
    public function getCodigoMonedaAttribute()
    {
        $codigomoneda = Catalogo::find($this->idtipomoneda);
        return $codigomoneda->codigo;
    }
    /**
    * Atributos Tipo de moneda
    */
    public function getMonedaAttribute()
    {
        $codigomoneda = Catalogo::find($this->idtipomoneda);
        return $codigomoneda->nombre;
    }
    /**
     * Relacion de one to many
     * Obtener la dependencia que tiene esta persona
     */
    public function detalles()
    {
        return $this->hasmany(CajaDetalle::class, 'idcaja', 'id');
    }

}
