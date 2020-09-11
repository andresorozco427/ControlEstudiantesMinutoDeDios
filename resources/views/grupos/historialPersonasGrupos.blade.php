@extends("app")

@section("contenido")
<div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 col-sm-12">
    <table class="table">
        <thead class="thead-dark">
            <th width="15px">#</th>
            <th>Nombre Persona</th>
            <th>Profesión</th>
            <th>Nombre Grupo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($historialGruposPersonas as $Indice => $value)
            <tr>
                <td class="col1">{{$Indice+1}}</td>
                <td>{{$value->nombrePersona}} {{$value->apellido}}</td>
                <td>{{$value->profesion}}</td>
                <td>{{$value->nombre}}</td>
                <td>{{date('d/m/Y', strtotime($value->fecha_inicio))}}</td>
                <td>{{date('d/m/Y', strtotime($value->fecha_fin))}}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="verHistorial({{$value->id}}, {{$value->identificacion}})" data-toggle="modal" data-target="#verDetalleHistorialGrupos">Ver detalle</button>
                    <button type="button" class="btn btn-danger" onclick="eliminarPersonaDeGrupo({{$value->id}}, {{$value->identificacion}})">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="verDetalleHistorialGrupos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información detalle estudiante y grupo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4><b>Información del estudiante</b></h4>
                <hr>
                <div class="form-row">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Identificacion">Identificacion:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Identificacion" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Nombre">Nombre:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Nombre" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Correo">Correo:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Correo" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Edad">Edad:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Edad" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Profesion">Profesion:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Profesion" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="Telefono">Telefono:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="Telefono" disabled>
                        </div>
                    </div>
                </div>
                <br>
                <h4><b>Información del curso</b></h4>
                <hr>
                <div class="form-row">
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="NombreCurso">Nombre:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="NombreCurso" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="fecha_inicio">Fecha Inicio:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="fecha_inicio" disabled>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                        <label class="control-label" for="fecha_fin">Fecha Fin:</label>
                        <div class="input-group input-group-prepend">
                            <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                            <input type="text" class="form-control" id="fecha_fin" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <label class="control-label" for="descripcion">Descripcion:</label>
                    <div class="input-group input-group-prepend">
                        <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                        <textarea class="form-control" id="descripcion" aria-label="With textarea" cols="110" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    <span class="fa fa-close"></span>Close
                </button>
                <input type="hidden" id="idcategoria" name="idcategoria">
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    function verHistorial(id, identificacion) {
        $.ajax({
            url: "/historialGrupos/ver",
            type: "GET",
            data: {
                'idGrupo': id,
                'identificacion': identificacion
            },
            dataType: 'json',
            success: function(data) {
                $('#Identificacion').val(data["identificacion"]);
                $('#Nombre').val(data["nombre"]);
                $('#Correo').val(data["correo"]);
                $('#Edad').val(data["edad"]);
                $('#Profesion').val(data["profesion"]);
                $('#Telefono').val(data["telefono"]);
                $('#NombreCurso').val(data["nombreGrupo"]);
                formatearEinsertarCampoFecha(data["fecha_inicio"], "fecha_inicio")
                formatearEinsertarCampoFecha(data["fecha_fin"], "fecha_fin")
                $('#descripcion').val(data["descripcion"]);
            }

        });

    }

    function formatearEinsertarCampoFecha(fecha, idCampo) {
        var fechaFormateadaEnBarras = new Date(fecha.split("/").reverse().join("-"));
        var dia = fechaFormateadaEnBarras.getDate() + 1;
        var mes = fechaFormateadaEnBarras.getMonth() + 1;
        var año = fechaFormateadaEnBarras.getFullYear();
        var NuevaFecha = dia + "/" + mes + "/" + año;

        $("#" + idCampo).val(NuevaFecha);
    }

    function eliminarPersonaDeGrupo(idGrupo, idPersona) {
        swal({
                title: "Estas seguro?",
                text: "Deseas eliminar la persona del respectivo grupo!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "/historialGrupos/eliminarPersonaGrupo",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'idGrupo': idGrupo,
                            'idPersona': idPersona
                        },
                        dataType: 'json',
                        success: function(data) {
                            swal("El usuario ha sido eliminado satisfactoriamente!", {
                                icon: "success",
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            });
    }
</script>
@endsection