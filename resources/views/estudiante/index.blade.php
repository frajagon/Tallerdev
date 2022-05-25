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
    <div class="col-md-3  nav justify-content-end">
        Total de estudiantes: {{ $estudiantes->total() }}
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
                    <th>Acudiente</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                <tbody>



                    {{ Form::open(array('route'=> 'estudiante.index', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
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
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Buscar</button>
                        </td>
                    </tr>
                    {{ Form::close() }}

                    @foreach($estudiantes as $estudiante)
                    <tr>
                        <td>
                            @if($estudiante->imagen)
                            <img class="table-avatar" src="{{asset('../storage/app/public/'.$estudiante->imagen)}}" alt="" width="50px">
                            @else
                            <img class="table-avatar" src="{{asset('dist/img/estudiantes/prueba-01.png')}}" alt="" width="50px">
                            @endif
                        </td>
                        <td>{{ $estudiante->get_nombres }}</td>
                        <td>{{ $estudiante->get_apellidos}}</td>
                        <td>{{ $estudiante->numero_identificacion }}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>
                            @if ($estudiante->id_acudiente)
                            {{$estudiante->acudiente->get_nombre_completo}}
                            @endif
                        </td>
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
                                    Inactivar
                                </button></a>
                        </td>
                    </tr>
                    @include('estudiante.modal')

                    @endforeach
                </tbody>
            </table>

            <!-- <table>
                <tr>
                    </td>
                    {{ $estudiantes->links() }}
                    </td>
                </tr>
            </table> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-9">
        {{ $estudiantes->links() }}
    </div>
</div>
@endsection