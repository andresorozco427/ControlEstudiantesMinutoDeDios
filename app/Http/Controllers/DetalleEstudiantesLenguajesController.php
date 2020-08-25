<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleEstudiantesLenguajesController extends Controller
{
    public function index(){
        return view("detalleestudiantelenguaje.index");
    }
}
