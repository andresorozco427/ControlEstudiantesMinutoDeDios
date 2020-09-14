<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $table = 'tbl_persona';
    protected $fillable = [
        'identificacion', 'id_tipo_identificacion', 'nombre', 'apellido', 'id_sexo', 'direccion',
        'telefono', 'correo', 'profesion', 'id_departamento', 'id_municipio', 'id_tipo_de_persona', 'edad', 'estado'
    ];
    public $timestamps = false;
    protected $primaryKey = 'identificacion';
    protected $keyType = 'string';
}
