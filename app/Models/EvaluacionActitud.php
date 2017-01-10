<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionActitud extends Model
{
    protected $table = 'evaluacion_actitud';
    protected $fillable = ['idmas', 'idactitud', 'idperiodoacademico','nota'];
}
