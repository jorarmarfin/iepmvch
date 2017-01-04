<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia';
    protected $fillable = ['idmatricula', 'idasignaturagrado', 'idestado','fecha','hora'];
}
