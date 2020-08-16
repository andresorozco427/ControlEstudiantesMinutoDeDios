<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleEstudiantesLenguajes extends Model
{
    public $table = 'tbl_detalle_estudiante_lenguajes';
    public $timestamps = false;

    protected $fillable = ['id_estudiante', 'id_lenguaje'];
}
