@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar grado academico por periodo</h3>
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
{!!Form::open(array('url'=>'gradoacademicoperiodo','method'=>'POST','autocomplete'=>'off')
)!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Docente</label>
            <select class="form-select form-control" aria-label="Default select example" name="id_docente" id="id_docente">
                <option selected="selected">Seleccione un docente</option>

                @foreach($docentes as $docente)
                <option value="{{$docente->id}}">
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
                <option value="{{$grado->id}}">
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
                <option value="{{$grupo->id}}">
                    {{$grupo->codigo}} - {{$grupo->nombre}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" value="{{old('nombre')}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="fecha_inicio">Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Fecha inicio" value="{{old('fecha_inicio')}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="fecha_fin">Fecha fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" placeholder="Fecha fin" value="{{old('fecha_fin')}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-select form-control" aria-label="Default select example" name="estado" id="estado">
                <option value="1" selected="selected">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('gradoacademicoperiodo')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>

</div>
{!!Form::close()!!}
@endsection