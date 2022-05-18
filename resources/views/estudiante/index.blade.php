@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de estudiantes</h5>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-9">
        <a href="{{url('estudiante/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Estudiante
            </button>
        </a>
        <a href="{{url('imprimirEstudiantes')}}" class="pull-right" target="_blank">
            <button class="btn btn-success">
                <i class="fas fa-file-pdf"></i>
                Imprimir Pdf
            </button>
        </a>
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
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($estudiantes as $estudiante)
                    <tr>
                        <td><img src="{{asset('dist/img/estudiantes/estudiante-01.png')}}" alt="" width="50px"></td>
                        <td>{{ $estudiante->primer_nombre }} {{ $estudiante->segundo_nombre }}</td>
                        <td>{{ $estudiante->primer_apellido}} {{ $estudiante->segundo_apellido}}</td>
                        <td>{{ $estudiante->numero_identificacion }}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>
                            @if ($estudiante->estado == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::action('App\http\Controllers\EstudianteController@edit',$estudiante->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$estudiante->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Eliminar
                                </button></a>
                        </td>
                    </tr>
                    @include('estudiante.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection