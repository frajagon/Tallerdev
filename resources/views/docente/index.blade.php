@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de docentes</h5>
    </div>
</div>

<br>

@if( Auth::user()->roles[0]['name'] == 'admin')
<div class="row">
    <div class="col-md-9">
        <a href="{{url('docente/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Docente
            </button>
        </a>
        <a href="{{url('imprimirDocentes')}}" class="pull-right" target="_blank">
            <button class="btn btn-success">
                <i class="fas fa-file-pdf"></i>
                Imprimir Pdf
            </button>
        </a>
    </div>
    <div class="col-md-3  nav justify-content-end">
        Total de docentes: {{ $docentes->total() }}
    </div>
</div>
@endif

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
                    {{ Form::open(array('route'=> 'docente.index', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
                    <tr>
                        <td></td>
                        <td>
                            {{ Form::text('nombres', $filtros['nombres'], ['class'=>'form-control', 'placeholder'=>'Nombres' ]) }}
                        </td>
                        <td>
                            {{ Form::text('apellidos', $filtros['apellidos'], ['class'=>'form-control', 'placeholder'=>'Apellidos' ]) }}
                        </td>
                        <td>
                            {{ Form::text('identificacion', $filtros['identificacion'], ['class'=>'form-control', 'placeholder'=>'Identificaciòn' ]) }}
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Buscar</button>
                        </td>
                    </tr>
                    {{ Form::close() }}



                    @foreach($docentes as $docente)
                    <tr>
                        <td>
                            @if($docente->imagen)
                            <img class="table-avatar" src="{{asset('../storage/app/public/'.$docente->imagen)}}" alt="" width="50px">
                            @else
                            <img class="table-avatar" src="{{asset('dist/img/docentes/prueba-01.png')}}" alt="" width="50px">
                            @endif
                        </td>
                        <td>{{ $docente->get_nombres }}</td>
                        <td>{{ $docente->get_apellidos }}</td>
                        <td>{{ $docente->numero_identificacion }}</td>
                        <td>{{ $docente->fecha_nacimiento }}</td>
                        <td>
                            @if ($docente->estado == 1)
                            Activo
                            @else
                            Inactivo
                            @endif
                        </td>
                        <td>
                            @if( Auth::user()->roles[0]['name'] == 'admin')
                            <a href="{{URL::action('App\http\Controllers\DocenteController@edit',$docente->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$docente->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                            @else

                            <a href="{{URL::action('App\http\Controllers\DocenteController@edit',$docente->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user"></i>
                                    Ver màs
                                </button></a>
                            @endif
                        </td>
                    </tr>
                    @include('docente.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-9">
        {{ $docentes->links() }}
    </div>
</div>
@endsection