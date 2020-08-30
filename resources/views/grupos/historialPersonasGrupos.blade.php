@extends("app")

@section("contenido")
<div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                    <th width="15px">#</th>
                    <th>Nombre Persona</th>
                    <th>Nombre Grupo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                </thead>
                <tbody>
                    @foreach ($historialGruposPersonas as $Indice => $value)
                    <tr>
                        <td class="col1">{{$Indice+1}}</td>
                        <td>{{$value->nombrePersona}} {{$value->apellido}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_inicio))}}</td>
                        <td>{{date('d/m/Y', strtotime($value->fecha_fin))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection