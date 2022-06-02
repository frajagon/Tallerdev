@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (Auth::user()->roles[0]['name'] == 'admin')
        <h3>Editar Estudiante</h3>
        @else
        <h3>Ver Estudiante</h3>
        @endif
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('App\http\Controllers\EstudianteController@update', $estudiante->id),'method'=>'patch', 'files'=>true))}}
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        @if($estudiante->imagen)
        <img src="{{asset('../storage/app/public/'.$estudiante->imagen)}}" alt="" width="100%">
        @else
        <img src="{{asset('dist/img/estudiantes/prueba-01.png')}}" alt="" width="100%">
        @endif
        <input type="file" class="form-control" name="imagen" id="imagen" value="">
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" value="{{$estudiante->primer_nombre}}" placeholder="Primer nombre" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" value="{{$estudiante->segundo_nombre}}" placeholder="Segundo nombre" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" value="{{$estudiante->primer_apellido}}" placeholder="Primer apellido" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" value="{{$estudiante->segundo_apellido}}" placeholder="Segundo apellido" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="genero">Sexo</label>
                    <select class="form-select form-control" aria-label="Default select example" name="id_genero" id="id_genero" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                        <option selected="selected">Seleccione una opción</option>

                        @foreach($generos as $genero)
                        <option value="{{$genero->id}}" @if ($estudiante->id_genero == $genero->id) selected="selected" @endif
                            >
                            {{$genero->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="numero_identificacion">Número de Identificación</label>
                    <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="{{$estudiante->numero_identificacion}}" placeholder="Número de identificación" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$estudiante->fecha_nacimiento}}" placeholder="Fecha de Nacimiento" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Grado academicos - Periodo</label>
                    <select class="form-select form-control" aria-label="Default select example" name="id_grado_academico_periodo" id="id_grado_academico_periodo" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif >
                        <option selected="selected">Seleccione una opción</option>

                        @foreach($gradosAcademicos as $gradoAcademico)
                        <option value="{{$gradoAcademico->id}}" @if ($estudiante->id_gradoAcademico == $gradoAcademico->id) selected="selected" @endif
                            >
                            {{$gradoAcademico->nombre}} | {{$gradoAcademico->gradosacademicos->nombre}} - {{$gradoAcademico->grupo->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Acudiente</label>
                    <select class="form-select form-control" aria-label="Default select example" name="id_acudiente" id="id_acudiente" @if (Auth::user()->roles[0]['name'] != 'admin') disabled @endif>
                        <option selected="selected">Seleccione un acudiente</option>

                        @foreach($acudientes as $acudiente)
                        <option value="{{$acudiente->id}}" @if ($estudiante->id_acudiente == $acudiente->id) selected="selected" @endif
                            >
                            {{$acudiente->primer_nombre}} {{$acudiente->segundo_nombre}} {{$acudiente->primer_apellido}} {{$acudiente->segundo_apellido}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if( Auth::user()->roles[0]['name'] == 'admin' )
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-select form-control" aria-label="Default select example" name="estado" id="estado">
                        <option value="1" @if ($acudiente->estado == 1) selected="selected" @endif>Activo</option>
                        <option value="0" @if ($acudiente->estado != 1) selected="selected" @endif>Inactivo</option>
                    </select>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" disabled value="@if ($acudiente->estado == 1) Activo @else Inactivo  @endif">
                </div>
            </div>
            @endif

        </div>
    </div>

</div>

<BR></BR>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group text-end">
            @if( Auth::user()->roles[0]['name'] == 'admin' )
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            @endif
            <a class="btn btn-info" type="reset" href="{{url('estudiante')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection