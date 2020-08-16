<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    public $table = 'tbl_tipo_de_persona';
    protected $fillable = ['id','nombre'];
    public $timestamps = false;
}
