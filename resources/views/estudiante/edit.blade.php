@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Estudiante</h3>
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
{{Form::open(array('action'=>array('App\http\Controllers\EstudianteController@update', $estudiante->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre</label>
            <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" value="{{$estudiante->primer_nombre}}" placeholder="Primer nombre">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" value="{{$estudiante->segundo_nombre}}" placeholder="Segundo nombre">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" value="{{$estudiante->primer_apellido}}" placeholder="Primer apellido">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" value="{{$estudiante->segundo_apellido}}" placeholder="Segundo apellido">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="numero_identificacion">Número de Identificación</label>
            <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="{{$estudiante->numero_identificacion}}" placeholder="Número de identificación">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$estudiante->fecha_nacimiento}}" placeholder="Fecha de Nacimiento">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{$estudiante->estado}}" placeholder="Estado">
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            <a class="btn btn-info" type="reset" href="{{url('estudiante')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection