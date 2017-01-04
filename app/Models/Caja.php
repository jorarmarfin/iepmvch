<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'caja';
    protected $fillable = ['recibi', 'dni', 'cantidad','monto','valortotal','concepto','idalumno','idgrado','entrada','salida','saldo','fecha','hora','idmatricula','idtipo','descripcion'];
}
