<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticaResumen extends Model
{
    protected $table = 'practica_resumen';
    protected $fillable = ['idmatricula', 'pc1_n', 'pc1_l','pc2_n','pc2_l','pc3_n','pc3_l','pc4_n','pc4_l','pc5_n','pc5_l','pc6_n','pc6_l','ppc'];
}
