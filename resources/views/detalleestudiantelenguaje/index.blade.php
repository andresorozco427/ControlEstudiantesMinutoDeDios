@extends("app")

@section("contenido")
<div class="row">
    <div class="col">
        <h3 class="text-center">Estudiantes</h1>
    </div>
</div>
<form action="#" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">Info Estudiante</h4>
                </div>
                <div class="row card-body">

                    <div class="form-group col-6">
                        <label for="">Identificación</label>
                        <input type="text" class="form-control" name="identificacion">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Tipo de Identificación</label>
                        <select class="form-control" name="id_tipo_identificacion"></select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" name="apellido">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Género</label>
                        <select class="form-control" name="id_sexo"></select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" name="direccion">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control" name="telefono">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Profesión</label>
                        <input type="text" class="form-control" name="profesion">
                    </div>

                    <div class="form-group col-6">
                        <label for="">Departamento</label>
                        <select class="form-control" name="id_departamento"></select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Municipio</label>
                        <select class="form-control" name="id_municipio"></select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Tipo de Persona</label>
                        <select class="form-control" name="id_tipo_de_persona"></select>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Edad</label>
                        <input type="text" class="form-control" name="edad">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">Info Lenguaje</h4>
                </div>
                <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection