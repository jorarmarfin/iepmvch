<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservapsicologica extends Model
{
    protected $table = 'reservapsicologica';
    protected $fillable = ['fecha', 'hora', 'persona','motivo','observacion','idpersonal','idestado','activo'];
}
