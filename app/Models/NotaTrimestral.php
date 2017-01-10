<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaTrimestral extends Model
{
    protected $table = 'nota_trimestral';
    protected $fillable = ['idmas', 'idperiodoacademico', 'promedio_logro','promedio_actitud','examen_trimestral','promedio_trimestral','comportamiento','recomendaciones'];
}
