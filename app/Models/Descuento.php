<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuento';
    protected $fillable = ['descripcion', 'valor', 'fechainicial','fechainicial','idmatricula','idnivel','idtipo','activo'];
}
