<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicadorResumen extends Model
{
    protected $table = 'indicador_resumen';
    protected $fillable = ['idmas', 'idperiodoacademico', 'in_01','in_02','in_03','in_04','in_05','in_06','in_07','in_08','in_09','in_10', 'in_11','in_12','in_13','in_14','in_15','in_16','in_17','in_18','in_19','in_20','logro_01','logro_02','logro_03','logro_04','promedio_logro','ac_01','ac_02','ac_03','ac_04','ac_05','promedio_actitud'];
}
