@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar Acudiente</h3>
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
{!!Form::open(array('url'=>'acudiente','method'=>'POST','autocomplete'=>'off', 'files'=>true)
)!!}
{{Form::token()}}
<div class="row">    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <img src="{{asset('dist/img/acudientes/prueba-01.png')}}" alt="" width="100%">
        <input type="file" class="form-control" name="imagen" id="imagen" value="">
    </div>
    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" placeholder="Primer nombre"  value="{{old('primer_nombre')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" placeholder="Segundo nombre"  value="{{old('segundo_nombre')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" placeholder="Primer apellido"  value="{{old('primer_apellido')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" placeholder="Segundo apellido"  value="{{old('segundo_apellido')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="numero_identificacion">Número de Identificación</label>
                    <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" placeholder="Número de identificación"  value="{{old('numero_identificacion')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento"  value="{{old('fecha_nacimiento')}}">
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


        <div class="row">
            <div class="col">
                <hr>
                <h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                    Credenciales de acceso
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" class="form-control" placeholder="Email de ingreso" aria-label="Username" aria-describedby="basic-addon1" name="usuario" id="usuario" value="{{old('usuario')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </span>
                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" name="clave" id="clave">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('acudiente')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>

</div>
{!!Form::close()!!}
@endsection