@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recuperar Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col-md-4">
                                    <img src="{{asset('dist/img/logo-jardin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 img-thumbnail" style="opacity: .8">
                                </div>

                                <div class="col-md-8">
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                        
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-0">
                                        <div class="col-md-12 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Enviar link de recuperación contraseña') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-12 offset-md-1">
                                            <br>
                                            <br>
                                            Se enviara un correo electronico con el enlace para la restauración o recuperación
                                            de la contraseña
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection