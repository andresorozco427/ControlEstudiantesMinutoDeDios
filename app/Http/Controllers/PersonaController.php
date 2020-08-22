<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Persona;
use Models\Departamentos;
use Models\Municipios;
use Models\Sexo;
use Models\TipoDocumento;
use Models\TipoPersona;
use Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::select("tbl_persona.*", "tbl_departamentos.departamento", "tbl_municipios.municipio", 
        "tbl_tipo_de_persona.nombre", "tbl_sexo.nombre", "tbl_tipos_de_documento.nombre")
        ->join("tbl_departamentos", "tbl_persona.id_departamento", "=", "id")
        ->join("tbl_municipios", "tbl_persona.id_municipio", "=", "id")
        ->join("tbl_tipo_de_persona", "tbl_persona.id_tipo_de_persona", "=", "id")
        ->join("tbl_sexo", "tbl_persona.id_sexo", "=", "id")
        ->join("tbl_tipos_de_documento", "tbl_persona.id_tipo_identificacion", "=", "id")
        ->get();

        return response()->json([
            "ok"=> true,
            "data"=> $personas
        ]);
    }

    public function detalle()
    {
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $respuesta)
    {
        $datos = $respuesta->all();

        $validador = Validator::make($respuesta->all(), [
            'id_tipo_identificacion' => 'required|numeric|max:11',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'id_sexo' => 'required|numeric|max:11',
            'direccion' => 'required|max:50',
            'telefono' => 'required|max:20',
            'correo' => 'required|max:50',
            'profesion' => 'required|max:50',
            'id_departamento' => 'required|numeric|max:11',
            'id_municipio' => 'required|numeric|max:11',
            'id_tipo_de_persona' => 'required|numeric|max:11',
            'edad' => 'required|numeric|max:3',
        ]);

        if ($validador->fails()){
            return response()->json([
              'ok'=> false,
              'error'=> $validador
              ]);
        }

        try{
            Persona::create($datos);

        return response()->json([
            "ok"=> true,
            "mensaje" => "Registro exitoso" 
        ]);

        }catch(\Exception $ex){
            return response()->json([
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
        $personas = Persona::select("tbl_persona.*", "tbl_departamentos.departamento", "tbl_municipios.municipio", 
        "tbl_tipo_de_persona.nombre", "tbl_sexo.nombre", "tbl_tipos_de_documento.nombre")
        ->join("tbl_departamentos", "tbl_persona.id_departamento", "=", "id")
        ->join("tbl_municipios", "tbl_persona.id_municipio", "=", "id")
        ->join("tbl_tipo_de_persona", "tbl_persona.id_tipo_de_persona", "=", "id")
        ->join("tbl_sexo", "tbl_persona.id_sexo", "=", "id")
        ->join("tbl_tipos_de_documento", "tbl_persona.id_tipo_identificacion", "=", "id")
        ->where("id_departamento", $id)
        ->where("id_municipio", $id)
        ->where("id_tipo_de_persona", $id) 
        ->where("id_sexo", $id)
        ->where("id_tipo_identificacion", $id)
        ->first();

        return response()->json([
            "ok"=> true,
            "data"=> $personas
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $respuesta, $id)
    {
        $datos = $respuesta->all();

        $validador = Validator::make($respuesta->all(), [
            'id_tipo_identificacion' => 'required|numeric|max:11',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'id_sexo' => 'required|numeric|max:11',
            'direccion' => 'required|max:50',
            'telefono' => 'required|max:20',
            'correo' => 'required|max:50',
            'profesion' => 'required|max:50',
            'id_departamento' => 'required|numeric|max:11',
            'id_municipio' => 'required|numeric|max:11',
            'id_tipo_de_persona' => 'required|numeric|max:11',
            'edad' => 'required|numeric|max:3',
        ]);

        if ($validador->fails()){
            return response()->json([
              'ok'=> false,
              'error'=> $validador
              ]);
        }

        try{
        $persona = Persona::find($id);

        if($persona == false){
            return response()->json([
                "ok" => false,
                "error" => "No se encontro el estudiante"
            ]);
        }

        $persona->update($input);

        return response()->json([
            "ok"=> true,
            "mensaje" => "Modificación exitosa" 
        ]);

        }catch(\Exception $ex){
            return response()->json([
                "ok" => false,
                "error" => $ex-> getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $persona = Persona::find($id);
    
            if($persona == false){
                return response()->json([
                    "ok" => false,
                    "error" => "No se encontro el estudiante"
                ]);
            }
    
            $persona->destroy($id);
    
            return response()->json([
                "ok"=> true,
                "mensaje" => "Eliminación exitosa" 
            ]);
    
            }catch(\Exception $ex){
                return response()->json([
                    "ok" => false,
                    "error" => $ex-> getMessage()
                ]);
            }
    }
}
