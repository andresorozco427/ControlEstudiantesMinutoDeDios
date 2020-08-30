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
                </thead>
                <tbody>
                    @foreach ($grupos as $Indice => $value)
                    <tr>
                        <td class="col1">{{$Indice+1}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{ date('d/m/Y', strtotime($value->fecha_inicio))}}</td>
                        <td>{{ date('d/m/Y', strtotime($value->fecha_fin))}}</td>
                        <td>{{$value->descripcion}}</td>
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
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
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
@endsection