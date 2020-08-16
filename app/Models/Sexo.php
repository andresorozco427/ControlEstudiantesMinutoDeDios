<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public $table = 'tbl_sexo';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
