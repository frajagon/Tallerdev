@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar Actividad</h3>
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
{!!Form::open(array('url'=>'calendarioactividad','method'=>'POST','autocomplete'=>'off')
)!!}
{{Form::token()}}
<div class="row">

    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_actividad">Nombre actividad</label>
                    <input type="text" name="nombre_actividad" id="nombre_actividad" class="form-control" placeholder="Nombre actividad" value="{{old('nombre_actividad')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Fecha de inicio" value="{{old('fecha_inicio')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_fin">Fecha fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" placeholder="Fecha fin" value="{{old('fecha_fin')}}">
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion"cols="30" rows="10" class="form-control">{{old('descripcion')}}</textarea>
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
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('calendarioactividad')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>

</div>
{!!Form::close()!!}
@endsection