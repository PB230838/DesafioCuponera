@extends('layouts.mazer-blank')

@section('content')
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        </div>
                    <h1 class="auth-title">Iniciar sesión.</h1>
                    <p class="auth-subtitle mb-5">¡Bienvenido de nuevo!</p>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="email" type="text" class="form-control form-control-xl"
                                placeholder="Correo electrónico">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" type="password" class="form-control form-control-xl"
                                placeholder="Contraseña">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault" name="remember">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Mantener sesión iniciada
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Iniciar sesión</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}"
                                class="font-bold">Regístrate</a>.</p>
                        <p><a class="font-bold" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"
                   >
                    <div class="float-end pe-3">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
