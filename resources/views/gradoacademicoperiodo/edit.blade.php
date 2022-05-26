@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar grado academico</h3>
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
{{Form::open(array('action'=>array('App\http\Controllers\GradoAcademicoPeriodoController@update', $gradoacademico->id),'method'=>'patch'))}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Docente</label>
            <select class="form-select form-control" aria-label="Default select example" name="id_docente" id="id_docente">
                <option selected="selected">Seleccione un docente</option>

                @foreach($docentes as $docente)
                <option value="{{$docente->id}}" @if ($gradoacademico->id_docente == $docente->id) selected="selected" @endif >
                    {{$docente->primer_nombre}} {{$docente->segundo_nombre}} {{$docente->primer_apellido}} {{$docente->segundo_apellido}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Grado Academico</label>
            <select class="form-select form-control" aria-label="Default select example" name="id_grado_academico" id="id_grado_academico">
                <option selected="selected">Seleccione una opciòn</option>

                @foreach($grados as $grado)
                <option value="{{$grado->id}}" @if ($gradoacademico->id_grado_academico == $grado->id) selected="selected" @endif >
                    {{$grado->nombre}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Grupo</label>
            <select class="form-select form-control" aria-label="Default select example" name="id_grupo" id="id_grupo">
                <option selected="selected">Seleccione un grupo</option>

                @foreach($grupos as $grupo)
                <option value="{{$grupo->id}}" @if ($gradoacademico->id_grupo == $grupo->id) selected="selected" @endif >
                    {{$grupo->codigo}} - {{$grupo->nombre}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$gradoacademico->nombre}}" placeholder="nombre">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="fecha_inicio">Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Fecha inicio" value="{{$gradoacademico->fecha_inicio}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="fecha_fin">Fecha fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" placeholder="Fecha fin" value="{{$gradoacademico->fecha_fin}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-select form-control" aria-label="Default select example" name="estado" id="estado">
                <option value="1" @if ($gradoacademico->estado == 1) selected="selected" @endif>Activo</option>
                <option value="0" @if ($gradoacademico->estado != 1) selected="selected" @endif>Inactivo</option>
            </select>
        </div>
    </div>
</div>

<BR></BR>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group text-end">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            <a class="btn btn-info" type="reset" href="{{url('gradoacademicoperiodo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection