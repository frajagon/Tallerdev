@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de acudientes</h5>
    </div>
</div>

<br>

@if (Auth::user()->roles[0]['name'] == 'admin')
<div class="row">
    <div class="col-md-9">
        <a href="{{url('acudiente/create')}}" class="pull-right">
            <button class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Crear Acudiente
            </button>
        </a>
        <a href="{{url('imprimirAcudiente')}}" class="pull-right" target="_blank">
            <button class="btn btn-success">
                <i class="fas fa-file-pdf"></i>
                Imprimir Pdf
            </button>
        </a>
    </div>

    <div class="col-md-3  nav justify-content-end">
        Total de acudientes: {{ $acudientes->total() }}
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
                    {{ Form::open(array('route'=> 'acudiente.index', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
                    <tr>
                        <td></td>
                        <td>
                            {{ Form::text('nombres', $filtros['nombres'], ['class'=>'form-control', 'placeholder'=>'Nombres' ]) }}
                        </td>
                        <td>
                            {{ Form::text('apellidos', $filtros['apellidos'], ['class'=>'form-control', 'placeholder'=>'Apellidos' ]) }}
                        </td>
                        <td>
                            {{ Form::text('identificacion', $filtros['identificacion'], ['class'=>'form-control', 'placeholder'=>'Identificaci??n' ]) }}
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Buscar</button>
                        </td>
                    </tr>
                    {{ Form::close() }}

                    @foreach($acudientes as $acudiente)
                    <tr>
                        <td>
                            @if($acudiente->imagen)
                            <img class="table-avatar" src="{{asset('../storage/app/public/'.$acudiente->imagen)}}" alt="" width="50px">
                            @else
                            <img class="table-avatar" src="{{asset('dist/img/acudientes/prueba-01.png')}}" alt="" width="50px">
                            @endif
                        </td>
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
                        <td>
                            <a href="{{URL::action('App\http\Controllers\AcudienteController@edit',$acudiente->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    @if( Auth::user()->roles[0]['name'] == 'admin' )
                                    Actualizar
                                    @else
                                    Ver m??s
                                    @endif
                                </button></a>

                            @if( Auth::user()->roles[0]['name'] == 'admin' )
                            <a href="" data-target="#modal-delete-{{$acudiente->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                            @endif
                        </td>
                    </tr>
                    @include('acudiente.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-9">
        {{ $acudientes->links() }}
    </div>
</div>
@endsection