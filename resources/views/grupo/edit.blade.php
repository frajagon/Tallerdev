@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar grupo academico</h3>
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
{{Form::open(array('action'=>array('App\http\Controllers\GrupoController@update', $grupo->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="codigo">Descripción</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{$grupo->codigo}}" placeholder="Descripción">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$grupo->nombre}}" placeholder="nombre">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-select form-control" aria-label="Default select example" name="estado" id="estado">
                <option value="1" @if ($grupo->estado == 1) selected="selected" @endif>Activo</option>
                <option value="0" @if ($grupo->estado != 1) selected="selected" @endif>Inactivo</option>
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
            <a class="btn btn-info" type="reset" href="{{url('gradoacademico')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection