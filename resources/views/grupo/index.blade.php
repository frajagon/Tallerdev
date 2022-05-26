@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de grupos academicos</h5>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-9">
        <a href="{{url('grupo/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Grupo Academico
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
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->nombre }}</td>
                        <td>{{ $grupo->codigo}}</td>
                        <td>
                            @if ($grupo->estado == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::action('App\http\Controllers\GrupoController@edit',$grupo->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$grupo->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                        </td>
                    </tr>
                    @include('grupo.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection