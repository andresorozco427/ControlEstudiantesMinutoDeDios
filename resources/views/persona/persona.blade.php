@extends("app")

@section("header_styles")
<script type="text/javascript">
    function validarFormularioPersona() {
        var identificacion = document.getElementById("identificacion").value;
        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var telefono = document.getElementById("telefono").value;
        var edad = document.getElementById("edad").value;

        if (identificacion.length == 0) {
            swal("Atención", "El campo identificacion es obligatorio", "error");
            return false;
        } else if (nombre.length == 0) {
            swal("Atención", "El campo nombre es obligatorio", "error");
            return false;
        } else if (apellido.length == 0) {
            swal("Atención", "El campo apellido es obligatorio", "error");
            return false;
        } else if (telefono.length == 0) {
            swal("Atención", "El campo telefono es obligatorio", "error");
            return false;
        } else if (edad.length == 0) {
            swal("Atención", "El campo edad es obligatorio", "error");
            return false;
        } else {
            setTimeout(function() {
                swal("Exito", "Se ha registrado el estudiante " + nombre + " " + apellido +
                    "satisfactoriamente", "success");
            }, 500);
        }
    }
</script>
@endsection

@section("contenido")
<form action="{{url('/crearPersona')}}" method="post" onsubmit="return validarFormularioPersona()">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <br />
                    <h4 class="text-center">Info Estudiante</h4>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Identificación</label>
                        <input id="identificacion" type="text" class="form-control" name="identificacion">
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Tipo de Identificación</label>
                        <select id="id_tipo_identificacion" class="form-control" name="id_tipo_identificacion">
                            <option value="">Seleccione</option>
                            @foreach($tipodocumento as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre">
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Apellido</label>
                        <input id="apellido" type="text" class="form-control" name="apellido">
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Género</label>
                        <select class="form-control" name="id_sexo">
                            <option value="">Seleccione</option>
                            @foreach($sexo as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" name="direccion">
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Teléfono</label>
                        <input id="telefono" type="text" class="form-control" name="telefono">
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo">
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Profesión</label>
                        <input type="text" class="form-control" name="profesion">
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Departamento</label>
                        <select class="form-control" name="id_departamento">
                            <option value="">Seleccione</option>
                            @foreach($departamento as $value)
                            <option value="{{ $value->id }}">{{ $value->departamento }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Municipio</label>
                        <select class="form-control" name="id_municipio">
                            <option value="">Seleccione</option>
                            @foreach($municipio as $value)
                            <option value="{{ $value->id }}">{{ $value->municipio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Tipo de Persona</label>
                        <select class="form-control" name="id_tipo_de_persona">
                            <option value="">Seleccione</option>
                            @foreach($tipopersona as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Edad</label>
                        <input id="edad" type="text" class="form-control" name="edad">
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Lenguaje</label>
                        <select id="lenguaje_id" class="form-control" name="lenguaje_id[]" multiple>
                            <option value="">Seleccione</option>
                            @foreach($lenguaje as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Grupo</label>
                        <select id="grupo_id" class="form-control" name="grupo_id[]" multiple>
                            <option value="">Seleccione</option>
                            @foreach($grupos as $value)
                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12"></div>
                    <div class="form-group col-12 col-md-5 col-lg-5 col-xl-5 col-sm-12"></div>
                    <div class="form-group col-12 col-md-1 col-lg-1 col-xl-1 col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection