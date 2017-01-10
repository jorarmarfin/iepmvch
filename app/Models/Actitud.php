<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actitud extends Model
{
    protected $table = 'actitud';
    protected $fillable = ['nombre', 'orden', 'activo'];
}
