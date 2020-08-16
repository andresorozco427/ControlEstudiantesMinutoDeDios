<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public $table = 'tbl_tipos_de_documento';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
