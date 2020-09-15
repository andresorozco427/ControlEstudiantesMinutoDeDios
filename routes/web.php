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
Route::get("/", "PersonaController@index");
Route::get("/estudiantes", "PersonaController@index");
Route::post("/crearPersona", "PersonaController@store");
Route::get("/persona/ver", "PersonaController@show");

Route::get("/grupos", "GrupoController@index");
Route::post("/crearGrupo", "GrupoController@store");
Route::get('/grupos/ver','GrupoController@edit'); 
Route::post('grupos', 'GrupoController@update');

Route::get("/historialGrupos", "HistorialPersonasGruposController@index");
Route::get("/historialGrupos/ver", "HistorialPersonasGruposController@show");
Route::post("/historialGrupos/eliminarPersonaGrupo", "HistorialPersonasGruposController@destroy");
