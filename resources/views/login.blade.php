@extends('layout.app')

@section('content')
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: '¡Bienvenido!',
                text: "{{ session('success') }}",
                icon: 'success',
                timer: 2000, // Duración del mensaje en milisegundos (3 segundos)
                showConfirmButton: false,
            }).then(() => {
                // Redirigir a la página deseada después de mostrar el mensaje
                window.location.href = "{{ url('logados') }}"; // Reemplaza 'logados' con la ruta a la que deseas redirigir
            });
        });
    </script>
@endif

<main class="login-form">
    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="login-card shadow-lg">
                    <h3 class="text-center mb-4">Iniciar Sesión</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" placeholder="Correo Electrónico" id="email" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Contraseña</label>
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

                    <div class="text-center mt-3">
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Volver a IUE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Mostrar mensaje de error -->
@if ($errors->any())
    <div id="error-message" style="display: none;">
        {{ $errors->first() }}
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Verificar si hay un mensaje de error
        const errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            const message = errorMessage.textContent;
            if (message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message === 'These credentials do not match our records.' ? 'La contraseña o correo no son correctos.' : message,
                });
            }
        }
    });
</script>
@endsection
