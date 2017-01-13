<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaPsicologica extends Model
{
    protected $table = 'reserva_psicologica';
    protected $fillable = ['persona','idgrado','fecha','motivo','observacion','idpersonal','idestado','resultado','activo'];
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeActivo($cadenaSQL){
    	return $cadenaSQL->where('activo',1);
    }
    /**
     * Establecemos el la relacion con Grado
     * @return [type] [description]
     */
    public function Grado()
    {
        return $this->hasOne(Grado::class,'id','idgrado');
    }
    /**
     * Establecemos el la relacion con catalogo
     * @return [type] [description]
     */
    public function Estado()
    {
        return $this->hasOne(Catalogo::class,'id','idestado');
    }


}
