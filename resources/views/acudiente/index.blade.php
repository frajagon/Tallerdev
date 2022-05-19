@extends('layout.plantilla')

@section('contenido')
<div class="row">
    <div class="col">
        <h5 class="card-title">Listado de acudientes</h5>
    </div>
</div>

<br>

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
                    @foreach($acudientes as $acudiente)
                    <tr>
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
                        <td>
                            <a href="{{URL::action('App\http\Controllers\AcudienteController@edit',$acudiente->id)}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                    Actualizar
                                </button></a>

                            <a href="" data-target="#modal-delete-{{$acudiente->id}}" data-toggle="modal">
                                <button class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                    Inactivar
                                </button></a>
                        </td>
                    </tr>
                    @include('acudiente.modal')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection