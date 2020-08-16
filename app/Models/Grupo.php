<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $table = 'tbl_grupo';
    public $timestamps = false;

    protected $fillable = ['id', 'nombre', 'fecha_inicio', 'fecha_fin', 'descripcion'];
}
