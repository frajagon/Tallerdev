@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de grados academicos</h5>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-9">
        <a href="{{url('gradoacademico/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Grado Academico
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
                    <th>Descripcion</th>
                    <th>Orden</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($gradoacademicos as $gradoacademico)
                    <tr>
                        <td>{{ $gradoacademico->nombre }}</td>
                        <td>{{ $gradoacademico->descripcion}}</td>
                        <td>{{ $gradoacademico->orden }}</td>
                        <td>
                            @if ($gradoacademico->estado == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::action('App\http\Controllers\GradoAcademicoController@edit',$gradoacademico->id)}}">
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