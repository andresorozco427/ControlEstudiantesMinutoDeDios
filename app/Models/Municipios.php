<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    public $table = 'tbl_municipios';
    protected $fillable = ['id','municipio', 'estado', 'departamento_id'];
    public $timestamps = false; 
}
