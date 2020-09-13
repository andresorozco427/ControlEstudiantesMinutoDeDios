@extends("app")

@section("header_styles")
<script>
    function validar() {
        let nombre_ = $('#nombre').val();
        let fecha_inicio_ = $('#fechaInicio').val();
        let fecha_fin_ = $('#fechaFin').val();
        let descripcion_ = $('#descripcion').val();
        if (nombre_.length == 0 || /^\s+$/.test(nombre_)) {
            swal("Error", "El campo Nombre no puede ir vacío", "error");
            return false;
        }
        if (fecha_inicio_ === "") {
            swal({
                title: "El campo fecha no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
        if (fecha_fin === "") {
            swal({
                title: "El campo fecha no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
    }
</script>
<script>
    function validar_editar() {
        let nombre_ = $('#nombre_upd').val();
        let fecha_inicio_ = $('#fecha_inicio_upd').val();
        let fecha_fin_ = $('#fecha_fin_upd').val();
        if (nombre_.length == 0 || /^\s+$/.test(nombre_)) {
            swal("Error", "El campo Nombre no puede ir vacío", "error");
            return false;
        }
        if (fecha_inicio_ === "") {
            swal({
                title: "Fecha Inicio es obligatoria!",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
        if (fecha_fin === "") {
            swal({
                title: "Fecha Inicio es obligatoria!",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" /> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css"/>
@endsection

@section('contenido')
<div class="container-fluid" style="width:100%;height:120%;">
    <div class="row">
        <div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 col-sm-12">
            <table class="table" id="gruposDTB">
                <thead class="thead-dark">
                    <th width="15px">#</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($grupos as $Indice => $value)
                    <tr>
                        <td class="col1"><b>{{$Indice+1}}</b></td>
                        <td>{{$value->nombre}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_inicio))}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_fin))}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editar({{$value->id}})" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
            <form action="{{url('/crearGrupo')}}" onsubmit='return validar()' method="POST">
                {{ csrf_field() }}
                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    @error('nombre')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                        <label for="fechaInicio">Fecha Inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                        @error('fecha_inicio')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                        <label for="fechaFin">Fecha Fin</label>
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha Fin">
                    </div>
                </div>
                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="10" placeholder="Descripcion"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12"></div>
                    <div class="form-group col-12 col-md-5 col-lg-5 col-xl-5 col-sm-12"></div>
                    <div class="form-group col-12 col-md-1 col-lg-1 col-xl-1 col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Grupos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/grupos')}}" onsubmit='return validar_editar()' method="POST">
                    {{ csrf_field() }}
                    <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                        <label hidden>Id</label>
                        <input type="hidden" value="" id="id_upd" class="form-control" name="id_upd">
                    </div>
                    <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre_upd" name="nombre_upd" placeholder="Nombre">
                        @error('nombre')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                            <label for="fechaInicio">Fecha Inicio</label>
                            <input type="date" value="" class="form-control" id="fecha_inicio_upd" name="fecha_inicio_upd">
                            @error('fecha_inicio')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12">
                            <label for="fechaFin">Fecha Fin</label>
                            <input type="date" class="form-control" id="fecha_fin_upd" name="fecha_fin_upd" placeholder="Fecha Fin">
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion_upd" id="descripcion_upd" rows="10" placeholder="Descripcion"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    function editar(id) {
        $.ajax({
            url: '/grupos/ver',
            type: 'GET',
            data: {
                'id': id,
            },
            datatype: 'json',
            success: function(data) {
                $("#id_upd").val(data["id"]);
                $("#nombre_upd").val(data["nombre"]);
                $("#fecha_inicio_upd").val(data["fecha_inicio"]);
                $("#fecha_fin_upd").val(data["fecha_fin"]);
                $("#descripcion_upd").val(data["descripcion"]);
            }
        });
    }
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#gruposDTB').DataTable();
        responsive : true;
        autowitdh: false;
    } );
</script>
@endsection