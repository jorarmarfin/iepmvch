<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoFamiliar extends Model
{
    protected $table = 'alumno_familiar';
    protected $fillable = ['idalumno', 'idfamiliar'];
}
