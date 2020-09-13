@extends("app")

@section("contenido")
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 col-sm-12">
            <table class="table">
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
                        <td class="col1">{{$Indice+1}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_inicio))}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_fin))}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>   
                        <button type="button" class="btn btn-primary" onclick="editar({{$value->id}})" data-toggle="modal" data-target="#exampleModal">Editar</button>                        
                          
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
            <form action="{{url('/crearGrupo')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    @error('nombre')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fechaInicio">Fecha Inicio</label>
                        <input type="date"  class="form-control" id="fechaInicio" name="fechaInicio">
                        @error('fecha_inicio')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fechaFin">Fecha Fin</label>
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha Fin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="10" placeholder="Descripcion"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>
 
     <!-- Modal para editar -->
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
                                    <div class="container-fluid">
                                            <form action="{{url('/grupos')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="col-md-12">
                                                    <label hidden>Id</label>
                                                    <input type="hidden" value="" id="id_upd" class="form-control"  name="id_upd">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre_upd" name="nombre_upd" placeholder="Nombre">
                                                    @error('nombre')
                                                    <p style="color: red;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="fechaInicio">Fecha Inicio</label>
                                                        <input type="date"  value="" class="form-control" id="fecha_inicio_upd" name="fecha_inicio_upd">
                                                        @error('fecha_inicio')
                                                        <p style="color: red;">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="fechaFin">Fecha Fin</label>
                                                        <input type="date"  class="form-control" id="fecha_fin_upd" name="fecha_fin_upd" placeholder="Fecha Fin">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descripcion">Descripcion</label>
                                                    <textarea class="form-control" name="descripcion_upd" id="descripcion_upd" rows="10" placeholder="Descripcion"></textarea>
                                                </div>
                                            
                                            
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>       
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- fin modal de editar -->

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
@endsection