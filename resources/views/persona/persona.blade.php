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
<script src="https://kit.fontawesome.com/028284e1f8.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/input.css')}}" />
@endsection

@section("contenido")
<button id="crearEstudiantebtn" class="btn btn-primary" onclick="ocultarEstudiante()">Ocultar Formulario</button>
<div id="formularioRegistroEstudiante">
    <form action="{{url('/crearPersona')}}" method="post" onsubmit="return validarFormularioPersona()">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">                        
                        <h4 class="text-center">Crear Usuario</h4>
                        <hr>
                        <br>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                            <label for="">Identificación</label>
                            <input id="identificacion" type="text" class="form-control" name="identificacion" placeholder="Identificación">
                            <i class="fas fa-address-card"></i>
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
                            <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                            <label for="">Apellido</label>
                            <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellido">
                            <i class="fas fa-user"></i>
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
                            <input type="text" class="form-control" name="direccion" placeholder="Dirección">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                            <label for="">Teléfono</label>
                            <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Teléfono">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" name="correo" placeholder="Correo">
                            <i class="far fa-envelope"></i>
                        </div>

                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                            <label for="">Profesión</label>
                            <input type="text" class="form-control" name="profesion" placeholder="Profesión">
                            <i class="fas fa-user-tie"></i>
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
                            <input id="edad" type="text" class="input form-control" name="edad" placeholder="edad">
                            <i class="fas fa-user" area-hidden="true"></i>
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
                            <label for="" class="col-2">Grupo</label>
                            <select id="grupo_id" class="form-control col-2" name="grupo_id[]" multiple>
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
</div>
<hr>
<h4 align="center">Información personas</h4>
<hr>
<br>
<div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">    
    <table id="tablaEstudiantes" class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Identificacion</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $Indice => $value)
            <tr>
                <td class="col1"><b>{{$Indice+1}}</b></td>
                <td>{{$value->identificacion}}</td>
                <td>{{$value->nombre}}</td>
                <td>{{$value->apellido}}</td>
                <td>{{$value->edad}}</td>
                <td>{{$value->telefono}}</td>
                <td>{{$value->direccion}}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="verPersona({{$value->identificacion}})" data-toggle="modal" data-target="#verPersona"><i class="fa fa-eye" aria-hidden="true"></i></button>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="verPersona" class="modal fade animated" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información estudiante</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Identificación</label>
                        <input id="identificacionVer" type="text" class="form-control" name="identificacionVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Tipo de Identificación</label>
                        <input id="tipoIdentificacionVer" type="text" class="form-control" name="tipoIdentificacionVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Nombre</label>
                        <input id="nombreVer" type="text" class="form-control" name="nombreVer" disabled>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Apellido</label>
                        <input id="apellidoVer" type="text" class="form-control" name="apellidoVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Género</label>
                        <input id="generoVer" type="text" class="form-control" name="generoVer" disabled>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Dirección</label>
                        <input id="direccionVer" type="text" class="form-control" name="direccionVer" disabled>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Teléfono</label>
                        <input id="telefonoVer" type="text" class="form-control" name="telefonoVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Correo</label>
                        <input id="correoVer" type="text" class="form-control" name="correoVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Profesión</label>
                        <input id="profesionVer" type="text" class="form-control" name="profesionVer" disabled>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Departamento</label>
                        <input id="departamentoVer" type="text" class="form-control" name="departamentoVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Municipio</label>
                        <input id="municipioVer" type="text" class="form-control" name="municipioVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Tipo de Persona</label>
                        <input id="tipoPersonaVer" type="text" class="form-control" name="tipoPersonaVer" disabled>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Edad</label>
                        <input id="edadVer" type="text" class="form-control" name="edadVer" disabled>
                    </div>

                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Lenguaje</label>
                        <ul id="lenguajesVer" class="list-group list-group-flush">                            
                        </ul>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label for="">Grupo</label>
                        <ul id="gruposVer" class="list-group list-group-flush">                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    $(document).ready(function() {
        $('#tablaEstudiantes').DataTable();
    });
    function verPersona(identificacion) {
        $.ajax({
            url: '/persona/ver',
            type: 'GET',
            data: {
                'identificacion': identificacion,
            },
            datatype: 'json',
            success: function(data) {
                $('#lenguajesVer').empty();
                $('#gruposVer').empty();
                $("#identificacionVer").val(data.Persona["identificacion"]);
                $("#tipoIdentificacionVer").val(data.Persona["nombreTipoIdentificacion"]);
                $("#nombreVer").val(data.Persona["nombre"]);
                $("#apellidoVer").val(data.Persona["apellido"]);
                $("#generoVer").val(data.Persona["nombreGenero"]);
                $("#direccionVer").val(data.Persona["direccion"]);
                $("#telefonoVer").val(data.Persona["telefono"]);
                $("#correoVer").val(data.Persona["correo"]);
                $("#profesionVer").val(data.Persona["profesion"]);
                $("#departamentoVer").val(data.Persona["departamento"]);
                $("#municipioVer").val(data.Persona["municipio"]);
                $("#tipoPersonaVer").val(data.Persona["tipoPersona"]);
                $("#edadVer").val(data.Persona["edad"]);
                $.each(data["lenguajes"], function(i, elemento) {                    
                    $('#lenguajesVer').append('<li class="list-group-item">'+elemento.nombre+'</li>');
                });   
                $.each(data["grupos"], function(i, elemento) {                    
                    $('#gruposVer').append('<li class="list-group-item">'+elemento.nombre+'</li>');
                });            
            }
        });
    }

    function ocultarEstudiante() {
        var x = document.getElementById("formularioRegistroEstudiante");
        if (x.style.display === "none") {
            $("#crearEstudiantebtn").html("Ocultar Formulario");
            x.style.display = "block";
        } else {
            $("#crearEstudiantebtn").html("Crear Estudiante");
            x.style.display = "none";
        }
    }
</script>
@endsection