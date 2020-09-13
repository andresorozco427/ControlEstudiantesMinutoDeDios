<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $table = 'tbl_grupo';
    public $timestamps = false;
    protected $casts = [
        'fecha_inicio' => 'datetime:Y-m-d',
        'fecha_fin'=>'datetime:Y-m-d'
    ];
    

    protected $fillable = ['id', 'nombre', 'fecha_inicio', 'fecha_fin', 'descripcion'];
}
