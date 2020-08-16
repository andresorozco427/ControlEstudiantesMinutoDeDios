<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    public $table = 'tbl_departamentos';
    public $timestamps = false;

    protected $fillable = ['id', 'departamento'];
}
