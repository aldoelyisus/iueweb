@extends('layout.app')

@section('content')
@if(session('success'))
    <h1 class="text-center success-message">{{ session('success') }}</h1>
@endif

<main class="login-form">
    <!-- Mostrar mensaje de error -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="container mx-auto"> <!-- Agregamos mx-auto para centrar -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8"> <!-- Ajuste aquí para pantallas grandes -->
                <div class="login-card shadow-lg">
                    <h3 class="text-center mb-4">Iniciar Sesión</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="email" placeholder="Correo Electrónico" id="email" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" placeholder="Contraseña" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recuérdame</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block text-dark">Entrar</button>
                        </div>
                    </form>

                    <!-- Botón para volver a la página de bienvenida -->
                    <div class="text-center mt-3">
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Volver a IUE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
