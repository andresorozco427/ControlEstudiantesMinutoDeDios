<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialEstudianteGrupo extends Model
{
    public $table = 'tbl_historial_estudiantes_grupos';
    public $timestamps = false;

    protected $fillable = ['id', 'id_persona', 'id_grupo'];
}
