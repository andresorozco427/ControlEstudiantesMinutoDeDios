@extends("app")

@section("contenido")
<div class="row">
    <div class="col">
        <h3 class="text-center">Crear Estudiantes</h1>
    </div>
</div>
<form action="#" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <br />
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
                        <input type="text" class="form-control" name="apellido">
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
                        <input type="text" class="form-control" name="telefono">
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
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                        <label for="">Edad</label>
                        <input type="text" class="form-control" name="edad">
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                        <label for="">Lenguaje</label>
                        <select id="lenguaje_id" class="form-control" name="lenguaje_id">
                            <option value="">Seleccione</option>
                            @foreach($lenguaje as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                    <div class="col-12">
                        <button onclick="agregar_estudiante()" type="button"
                            class="btn btn-success float-right">Agregar</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12">
            <br />
            <div class="card">
                <table class="table">
                    <thead>
                        <th>Tipo</th>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Lenguaje</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="tblLenguajes">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@endsection

@section("script")
<script>
    function agregar_estudiante() {
        let lenguaje_id = $("#lenguaje_id option:selected").val();
        let lenguaje_text = $("#lenguaje_id option:selected").text();
        let tipo_identificacion = $("#id_tipo_identificacion option:selected").val();
        let tipo_identificacion_text = $("#id_tipo_identificacion option:selected").text();
        let identificacion = $("#identificacion").val();
        let nombre = $("#nombre").val();

            $("#tblLenguajes").append(`
                <tr id="tr-${identificacion}">
                    <td>${tipo_identificacion_text}</td>
                    <td>${identificacion}</td>
                    <td>${nombre}</td>
                    <td>
                        <input type="hidden" name="lenguaje_id[]" value="${lenguaje_id}" />
                        <input type="hidden" name="tipo_identificacion[]" value="${tipo_identificacion}" />
                        ${lenguaje_text}
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="eliminar_lenguaje(${identificacion})">X</button>
                    </td>
                </tr>
            `);
    }

    function eliminar_lenguaje(id){
        $("#tr-"+id).remove;
    }

</script>
@endsection