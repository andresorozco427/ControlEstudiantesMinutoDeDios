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
                <td><a href="#" class="edit-modal btn btn-secondary btn-sm" onclick="verHistorial({{$value->id}},{{$value->identificacion}})" title="Edit implement" data-target='#edit-implemento' data-toggle='modal'>
                        <i class="fa fa-edit iconColor"></i>
                    </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Form Show Categoria -->
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #48DA7D">
                <h4 class="modal-title">Ver detalle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <label class="control-label" for="id">Category Name:</label>
                    <div class="input-group input-group-prepend">
                        <span class="input-group-text border-right-0  rounded-0" style="background: #48DA7D;"><i class="fa fa-fw fa-thumb-tack"></i></span>
                        <input type="text" class="form-control show_categoria" id="show_categoria" disabled>
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

@section("footer_scripts")
<script>
    function verHistorial(id, identificacion) {
        console.log(id, identificacion);
        $.ajax({
            url: "/historialGrupos/ver",
            type: "GET",
            data: {
                'idGrupo': id,
                'identificacion': identificacion
            },
            dataType: 'json',
            success: function(data) {
               console.log(data);
            }

        });

    }
</script>
@endsection