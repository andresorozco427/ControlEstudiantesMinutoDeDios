<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", "DetalleEstudiantesLenguajesController@index");
Route::get("/estudiante/lenguajes", "DetalleEstudiantesLenguajesController@index");

Route::get("/grupos", "GrupoController@index");
Route::post("/crearGrupo", "GrupoController@store");

Route::get("/historialGrupos", "HistorialPersonasGruposController@index");