<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lenguajes extends Model
{
    public $table = 'tbl_lenguajes';
    public $timestamps = false;

    protected $fillable = ['id', 'nombre'];
}
