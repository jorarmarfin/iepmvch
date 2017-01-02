<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    protected $table = 'comunicacion';
    protected $fillable = ['idremitente', 'iddestinatario', 'mensaje','fecha','hora','idtipo','idestado'];
}
