<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sidebar.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .select2-selection {
            height: calc(1.5em + .75rem + 2px) !important;
        }
    </style>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" /> 
    <title>Estudiantes</title>
    @yield('header_styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="wrapper">
                <div class="side-bar">
                    <ul>
                        <li class="menu-head">
                            <b>CORPORACION MINUTO DE DIOS</b><a href="#" class="push_menu"><span class="glyphicon glyphicon-align-justify pull-right"></span></a>
                        </li>
                        <div class="menu">
                            <li>
                                <a href="{{ URL::to('estudiantes') }}" {!! (Request::is('estudiantes')? 'class="active"' :"") !!}>Estudiantes<span class="glyphicon glyphicon-user pull-right"></span></a>
                            </li>
                            <li>
                                <a href="{{ URL::to('grupos') }}" {!! (Request::is('grupos')? 'class="active"' :"") !!}>Grupos<span class="glyphicon glyphicon-heart pull-right"></span></a>
                            </li>
                            <li>
                                <a href="{{ URL::to('historialGrupos') }}" {!! (Request::is('historialGrupos')? 'class="active"' :"") !!}>Cursos<span class="glyphicon glyphicon-education pull-right"></span></a>
                            </li>
                        </div>

                    </ul>
                </div>
                <div class="content">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @yield('localizador')
                            </div>
                            <div class="contenidoBody">
                                <div class="panel-body">
                                    @yield('contenido')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/js/sidebar.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select").select2();
        });
    </script>


    @yield("script")

</body>

</html>