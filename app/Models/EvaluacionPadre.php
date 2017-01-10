<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionPadre extends Model
{
    protected $table = 'evaluacion_padre';
    protected $fillable = ['idmatricula', 'idaccionprincipal', 't1','t2','t3'];
}
