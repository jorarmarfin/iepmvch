<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaPsicologica extends Model
{
    protected $table = 'reserva_psicologica';
    protected $fillable = ['persona','motivo','observacion','idpersonal','idestado','activo'];
}
