<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $fillable = ['paterno', 'materno', 'nombres','dni','idsubnivel','fechanacimiento','idubigeonacimiento','idpais','religion','bautismo','comunion','confirmacion','idubigeo','direccion','telefonos','telefonoemergencia1','telefonoemergencia2','respadre','resmadre','resapoderado','idestado','observacion'];
}
