<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Departamentos;
use App\Models\Municipios;
use App\Models\Sexo;
use App\Models\TipoPersona;
use App\Models\Lenguajes;
use App\Models\TipoDocumento;
use App\Models\Grupo;
use App\Models\DetalleEstudiantesLenguajes;
use App\Models\HistorialEstudianteGrupo;
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
        ->join("tbl_departamentos", "tbl_persona.id_departamento", "=", "tbl_departamentos.id")
        ->join("tbl_municipios", "tbl_persona.id_municipio", "=", "tbl_municipios.id")
        ->join("tbl_tipo_de_persona", "tbl_persona.id_tipo_de_persona", "=", "tbl_tipo_de_persona.id")
        ->join("tbl_sexo", "tbl_persona.id_sexo", "=", "tbl_sexo.id")
        ->join("tbl_tipos_de_documento", "tbl_persona.id_tipo_identificacion", "=", "tbl_tipos_de_documento.id")
        ->get();

        $lenguaje = Lenguajes::all();
        $tipodocumento = TipoDocumento::all();
        $sexo = Sexo::all();
        $departamento = Departamentos::all();
        $municipio = Municipios::all();
        $tipopersona = TipoPersona::all();
        $grupos = Grupo::all();

        return view("persona.persona", compact("personas","lenguaje", "tipodocumento", "sexo", 
        "departamento", "municipio", "tipopersona", "grupos"));
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
    public function store(Request $request)
    {
        $persona = new Persona();

        $request->validate([
            'identificacion' => 'required|unique:tbl_persona',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|unique:tbl_persona',
            'edad' => 'required'
        ]);

        $persona->identificacion = $request->identificacion;
        $persona->id_tipo_identificacion = $request->id_tipo_identificacion;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->id_sexo = $request->id_sexo;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->profesion = $request->profesion;
        $persona->id_departamento = $request->id_departamento;
        $persona->id_municipio = $request->id_municipio;
        $persona->id_tipo_de_persona = $request->id_tipo_de_persona;
        $persona->edad = $request->edad;
        $estado = $this->guardarEstadoSegunGrupoRegistrado($request);
        $persona->estado = $estado;
        $persona->save();

        $this->guardarTablaDeDetalleLenguajesProgramacion($request);
        $this->guardarTablaDetalleHistorialGrupos($request);

        return redirect() -> back();
    }

    public function guardarEstadoSegunGrupoRegistrado(Request $request){
        $numeroDeCursos = $request->grupo_id;
        $estadoGrupoRegistrado = 0;
        if (is_countable($numeroDeCursos) && count($numeroDeCursos) > 0) {
            $estadoGrupoRegistrado = 1;
        }        
        return $estadoGrupoRegistrado;
    }

    public function guardarTablaDeDetalleLenguajesProgramacion(Request $request){
        $identificacionEstudiante = $request->identificacion;
        $numeroDeLenguajes = count($request->lenguaje_id);
        $lenguajes = $request->lenguaje_id;
        for ($i = 0; $i < $numeroDeLenguajes; $i++) {
            DetalleEstudiantesLenguajes::create([
                'id_estudiante' => $identificacionEstudiante,
                'id_lenguaje' => $lenguajes[$i]
            ]);
        }
    }

    public function guardarTablaDetalleHistorialGrupos(Request $request){
        $identificacionEstudiante = $request->identificacion;
        $numeroDeCursos = $request->grupo_id;
        $grupo = $request->grupo_id;
        if (is_countable($numeroDeCursos) && count($numeroDeCursos) > 0) {
            for ($i = 0; $i < count($numeroDeCursos); $i++) {
                HistorialEstudianteGrupo::create([
                    'id_persona' => $identificacionEstudiante,
                    'id_grupo' => $grupo[$i]
                ]);
            }
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
