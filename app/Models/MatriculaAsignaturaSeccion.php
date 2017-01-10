<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatriculaAsignaturaSeccion extends Model
{
    protected $table = 'matricula_asignatura_seccion';
    protected $fillable = ['idmatricula', 'idasignaturaseccion', 'nota_t1_n','nota_t1_l','nota_t2_n','nota_t2_l','nota_t3_n','nota_t3_l','exonerado'];
}
