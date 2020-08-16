<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    public $table = 'tbl_departamentos';
    protected $fillable = ['id', 'departamento'];
    public $timestamps = false;
}
