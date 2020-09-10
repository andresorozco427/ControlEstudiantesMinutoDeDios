<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialEstudianteGrupo;

class HistorialPersonasGruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialGruposPersonas = HistorialEstudianteGrupo::select('tbl_grupo.*','tbl_persona.identificacion', 'tbl_persona.nombre as nombrePersona', 'tbl_persona.apellido', 'tbl_persona.profesion')
                                    ->join("tbl_grupo", "tbl_historial_estudiantes_grupos.id_grupo","=","tbl_grupo.id")
                                    ->join("tbl_persona", "tbl_historial_estudiantes_grupos.id_persona","=","tbl_persona.identificacion")   
                                    ->get();
        
        return view('grupos.historialPersonasGrupos', compact('historialGruposPersonas'));                              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $idGrupo = $request->idGrupo;
        $identificacionPersona = $request->identificacion;

        $historialGruposPersonas = HistorialEstudianteGrupo::select('tbl_grupo.*','tbl_grupo.nombre as nombreGrupo','tbl_persona.*')
        ->join("tbl_grupo", "tbl_historial_estudiantes_grupos.id_grupo","=","tbl_grupo.id")
        ->join("tbl_persona", "tbl_historial_estudiantes_grupos.id_persona","=","tbl_persona.identificacion")   
        ->where('tbl_historial_estudiantes_grupos.id_grupo', $idGrupo)
        ->where('tbl_historial_estudiantes_grupos.id_persona', $identificacionPersona)
        ->first();

        return (response()->json($historialGruposPersonas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
