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
        "tbl_tipo_de_persona.nombre as tipoPersona", "tbl_sexo.nombre as nombreGenero", "tbl_tipos_de_documento.nombre as tipoDocumento")
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
        $persona->save();

        $this->guardarTablaDeDetalleLenguajesProgramacion($request);
        $this->guardarTablaDetalleHistorialGrupos($request);

        return redirect() -> back();
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
    public function show(Request $request)
    {
       $identificacionPersona = $request->identificacion;
       
       $personas = Persona::select("tbl_persona.*", "tbl_departamentos.departamento", "tbl_municipios.municipio", 
       "tbl_tipo_de_persona.nombre as tipoPersona", "tbl_sexo.nombre as nombreGenero", "tbl_tipos_de_documento.nombre as nombreTipoIdentificacion")
       ->join("tbl_departamentos", "tbl_persona.id_departamento", "=", "tbl_departamentos.id")
       ->join("tbl_municipios", "tbl_persona.id_municipio", "=", "tbl_municipios.id")
       ->join("tbl_tipo_de_persona", "tbl_persona.id_tipo_de_persona", "=", "tbl_tipo_de_persona.id")
       ->join("tbl_sexo", "tbl_persona.id_sexo", "=", "tbl_sexo.id")
       ->join("tbl_tipos_de_documento", "tbl_persona.id_tipo_identificacion", "=", "tbl_tipos_de_documento.id")
       ->where("tbl_persona.identificacion", $identificacionPersona)
       ->first();

       $lenguajes = DetalleEstudiantesLenguajes::select("tbl_lenguajes.*")
       ->join("tbl_lenguajes", "tbl_detalle_estudiante_lenguajes.id_lenguaje", "=", "tbl_lenguajes.id")
       ->where("tbl_detalle_estudiante_lenguajes.id_estudiante", $identificacionPersona)
       ->get();

       $grupos = HistorialEstudianteGrupo::select("tbl_grupo.*")
       ->join("tbl_grupo", "tbl_historial_estudiantes_grupos.id_grupo", "=", "tbl_grupo.id")
       ->where("tbl_historial_estudiantes_grupos.id_persona", $identificacionPersona)
       ->get();

       return (response()->json(array('Persona' => $personas, 'lenguajes' => $lenguajes, 'grupos' => $grupos)));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
