<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaUtiles extends Model
{
    protected $table = 'listautiles';
    protected $fillable = ['idgrado', 'idmaterial', 'observacion'];
}
