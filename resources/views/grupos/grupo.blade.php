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
                        <td>{{ date('d/m/Y', strtotime($value->fecha_inicio)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($value->fecha_fin)) }}</td>
                        <td>{{$value->descripcion}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
            <form>                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fechaInicio">Fecha Inicio</label>
                        <input type="email" class="form-control" id="fechaInicio" placeholder="Fecha Inicio">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fechaFin">Fecha Fin</lab  el>
                        <input type="password" class="form-control" id="fechaFin" placeholder="Fecha Fin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text-area" class="form-control" id="descripcion" placeholder="Descripcion">
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection