<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticaResumen extends Model
{
    protected $table = 'practica_resumen';
    protected $fillable = ['idmatricula','idasignaturagradoseccion', 'pc1_n', 'pc1_l','pc2_n','pc2_l','pc3_n','pc3_l','pc4_n','pc4_l','pc5_n','pc5_l','pc6_n','pc6_l','ppc'];

    /**
    * Atributos Datos de Matricula
    */
    public function getAlumnoAttribute()
    {
    	$matricula = Matricula::find($this->idmatricula);
    	return $matricula->alumno;
    }
    /**
    * Atributos Nota 1
    */
    public function getNota1Attribute()
    {
        $values = '';
        for ($i=0; $i <= 20; $i++) {
            $values .= '
                <li>
                    <a href="{{ route(\'docentes.practica.show\',[$this->id,1]) }}">
                        <i class="fa fa-edit"></i> '.$i.' </a>
                </li>
            ';
        }
        $combo_notas = '<select class="form-control">'.$values.'</select>';

        $combo_notas='
            <div class="btn-group">
                <button class="btn btn-xs green-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Nota
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-left" role="menu">
                    '.$values.'
                </ul>
            </div>

        ';

        if(is_null($this->pc1_n))return $combo_notas;
        return $this->pc1_n;
    }

}
