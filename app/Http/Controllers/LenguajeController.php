<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Lenguajes;
use Models\Persona;
use Models\DetalleEstudiantesLenguajes;
use Validator;


class LenguajeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        $lenguajes = Lenguajes::all();

        return response()->json([
            "ok"=> true,
            "data"=> $personas
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = DetalleEstudiantesLenguajes::select("tbl_detalle_estudiante_lenguajes.*",
        "tbl_persona.nombre", "tbl_lenguajes.nombre")
        ->join("tbl_persona", "tbl_detalle_estudiante_lenguajes.id_estudiante", "=", "tbl_persona.identificacion")
        ->join("tbl_lenguajes", "tbl_detalle_estudiante_lenguajes.id_lenguaje", "=", "tbl_lenguajes.id") 
        ->get();

        return response()->json([
            "ok"=> true,
            "data"=> $detalles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $respuesta->all();

        $validacion = Validator::make($input,[
            'cod_tarjeta' => 'required'
        ]);

        try{
            $lenguaje = Lenguaje::create(); 

            foreach($datos as $value){
                DetalleEstudiantesLenguajes::create(["id_lenguaje"=>$lenguaje->id, "id_estudiante"=>$value["identificacion"]]);
            }
            return response()->json([
                "ok" => true,
                "mensaje" => "Registro exitoso"
            ]);
        }catch (\Exception $ex){
            return  response()->json([
                "ok" => false,
                "error" => $ex-> getMessage()
            ]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
