<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de docentes</title>

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
                <h3 class="text-center">Reporte de Docentes</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-9">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombres Completos</th>
                            <th>Apellidos</th>
                            <th>Documento Identidad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            @foreach($docentes as $docente)
                            <tr>
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->primer_nombre }} {{ $docente->segundo_nombre }}</td>
                                <td>{{ $docente->primer_apellido}} {{ $docente->segundo_apellido}}</td>
                                <td>{{ $docente->numero_identificacion }}</td>
                                <td>{{ $docente->fecha_nacimiento }}</td>
                                <td>
                                    @if ($docente->estado == 1)
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