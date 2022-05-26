@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de grados academicos por periodo</h5>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-9">
        <a href="{{url('gradoacademicoperiodo/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Grado Academico por Periodo
            </button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-9">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($gradoacademicos as $gradoacademico)
                    <tr>
                        <td>{{ $gradoacademico->nombre }}</td>
                        <td>{{ $gradoacademico->fecha_inicio}}</td>
                        <td>{{ $gradoacademico->fecha_fin }}</td>
                        <td>
                            @if ($gradoacademico->estado == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::action('App\http\Controllers\GradoAcademicoPeriodoController@edit',$gradoacademico->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$gradoacademico->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                        </td>
                    </tr>
                    @include('gradoacademico.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection