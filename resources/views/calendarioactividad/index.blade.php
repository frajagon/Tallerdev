@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de actividades</h5>
    </div>
</div>

<br>


@if (Auth::user()->roles[0]['name'] == 'admin')
<div class="row">
    <div class="col-md-9">
        <a href="{{url('calendarioactividad/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Actividad
            </button>
        </a>
        <a href="{{url('imprimirEstudiantes')}}" class="pull-right" target="_blank">
            <button class="btn btn-success">
                <i class="fas fa-file-pdf"></i>
                Imprimir Pdf
            </button>
        </a>
    </div>
    <div class="col-md-3  nav justify-content-end">
        Total de actividades: {{ $actividades->total() }}
    </div>
</div>
@endif


<div class="row">
    <div class="col-md-12 col-xs-9">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nombres</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                <tbody>

                    <!-- { { Form::open(array('route'=> 'estudiante.index', 'method'=>'GET', 'class'=>'form-inline pull-right')) } }
                    <tr>
                        <td></td>
                        <td>
                            { { Form::text('nombres', $filtros['nombres'], ['class'=>'form-control', 'placeholder'=>'Nombres' ]) }}
                        </td>
                        <td>
                            { { Form::text('apellidos', $filtros['apellidos'], ['class'=>'form-control', 'placeholder'=>'Apellidos' ]) }}
                        </td>
                        <td>
                            { { Form::text('identificacion', $filtros['identificacion'], ['class'=>'form-control', 'placeholder'=>'Identificaciòn' ]) }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Buscar</button>
                        </td>
                    </tr>
                    { { Form::close() } } -->

                    @foreach($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->nombre_actividad }}</td>
                        <td>{{ $actividad->descripcion}}</td>
                        <td>{{ $actividad->fecha_inicio }}</td>
                        <td>{{ $actividad->fecha_fin }}</td>
                        <td>
                            @if ($actividad->estado == 1) Activo @else Inactivo @endif
                        </td>
                        <td>
                            @if (Auth::user()->roles[0]['name'] == 'admin' || Auth::user()->roles[0]['name'] == 'docente')

                            <a href="{{URL::action('App\http\Controllers\CalendarioActividadController@edit',$actividad->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$actividad->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                            @else
                            <a href="{{URL::action('App\http\Controllers\CalendarioActividadController@edit',$actividad->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user"></i>
                                    Ver màs
                                </button></a>
                            @endif
                        </td>
                    </tr>
                    @include('calendarioactividad.modal')

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-9">
        {{ $actividades->links() }}
    </div>
</div>
@endsection