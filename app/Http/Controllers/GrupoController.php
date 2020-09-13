<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();

        return view('grupos.grupo', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tbl_grupo',
            'fecha_inicio' => 'date_format:Y-m-d'
        ]);

        $grupo = new Grupo();
        $grupo->nombre=$request->nombre;
        $grupo->fecha_inicio=$request->fechaInicio;
        $grupo->fecha_fin=$request->fechaFin;
        $grupo->descripcion=$request->descripcion;
        $grupo->save();

        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        //
        $id = $request ->id;
        $grupos = grupo::find($id);
        return (response()->json($grupos));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
               
      // $grupos = grupo::findOrfail($id);

      $idGrupo = $request->id;
     $consultaGrupo = grupo::findOrFail($idGrupo);
     return (response()->json($consultaGrupo));
      // return view('grupos.edit', compact('grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $grupo = Grupo::findOrFail($request->id_upd);    
        $grupo->nombre = $request->nombre_upd;
        $grupo->fecha_inicio = $request->fecha_inicio_upd;
        $grupo->fecha_fin = $request->fecha_fin_upd;
        $grupo->descripcion = $request->descripcion_upd; 
    
        $grupo->save();
        
        return redirect('grupos');  
    
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
