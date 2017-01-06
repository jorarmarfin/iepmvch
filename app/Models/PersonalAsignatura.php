<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAsignatura extends Model
{
    protected $table = 'personal_asignatura';
    protected $fillable = ['idpersonal', 'idasignaturagradoseccion', 'tutor','notas'];
}
