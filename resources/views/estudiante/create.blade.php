@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar Estudiante</h3>
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
{!!Form::open(array('url'=>'estudiante','method'=>'POST','autocomplete'=>'off', 'files'=>true)
)!!}
{{Form::token()}}
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="{{asset('dist/img/estudiantes/prueba-01.png')}}" alt="" width="100%">
        <input type="file" class="form-control" name="imagen" id="imagen" value="">
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" placeholder="Primer nombre" value="{{old('primer_nombre')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" placeholder="Segundo nombre" value="{{old('segundo_nombre')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" placeholder="Primer apellido" value="{{old('primer_apellido')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" placeholder="Segundo apellido" value="{{old('segundo_apellido')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="numero_identificacion">Número de Identificación</label>
                    <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" placeholder="Número de identificación" value="{{old('numero_identificacion')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento" value="{{old('fecha_nacimiento')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Grado academico</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected="selected">Seleccione una opción</option>
                        <option>Parvulos</option>
                        <option>Pre-Jardín</option>
                        <option>Jardín</option>
                        <option>Transición</option>
                        <option>Primero de primaria</option>
                        <option>Segundo de primaria</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Grupo</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected="selected">Seleccione una opción</option>
                        <option>A1</option>
                        <option>A2</option>
                        <option>B1</option>
                        <option>B2</option>
                        <option>C1</option>
                        <option>C2</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="estado">Acudiente</label>
                    <select class="form-select form-control" aria-label="Default select example" name="id_acudiente" id="id_acudiente">
                        <option selected="selected">Seleccione un acudiente</option>

                        @foreach($acudientes as $acudiente)
                        <option value="{{$acudiente->id}}">
                            {{$acudiente->primer_nombre}} {{$acudiente->segundo_nombre}} {{$acudiente->primer_apellido}} {{$acudiente->segundo_apellido}}
                        </option>
                        @endforeach
                    </select>
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
            <a class="btn btn-info" type="reset" href="{{url('estudiante')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>

</div>
{!!Form::close()!!}
@endsection