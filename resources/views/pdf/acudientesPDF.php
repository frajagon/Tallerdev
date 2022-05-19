<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de acudientes</title>

    <link rel="stylesheet" href="{{public_path('dist/css/adminlte.min.css')}}">
</head>

<body>
    <div class="container_old">
        <div class="row">
            <div class="col">
                <img src="{{public_path('dist/img/logo.jpg')}}" alt="" width='60px'>
            </div>
            <div class="col-md-12 col-xs-12">
                <h4 class="text-center">Institución Universitaria Antonio Jose</h4>
            </div>
            <div class="row">
                <h3 class="text-center">Reporte de Acudientes</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-9">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Foto</th>
                            <th>Nombres Completos</th>
                            <th>Apellidos</th>
                            <th>Documento Identidad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            <td><img src="{{asset('dist/img/acudientes/acudiente-01.png')}}" alt="" width="50px"></td>
                            <td>{{ $acudiente->primer_nombre }} {{ $acudiente->segundo_nombre }}</td>
                            <td>{{ $acudiente->primer_apellido}} {{ $acudiente->segundo_apellido}}</td>
                            <td>{{ $acudiente->numero_identificacion }}</td>
                            <td>{{ $acudiente->fecha_nacimiento }}</td>
                            <td>
                                @if ($acudiente->estado == 1)
                                Activo
                                @else
                                Inactivo
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>