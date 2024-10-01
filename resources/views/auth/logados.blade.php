<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="{{ asset('img/admin_fiveicon.png') }}" type="image/x-icon">
</head>
<body>

@include('includes.sidebar')

<!-- Pantalla de carga -->
<div id="loading">
    <img src="{{ asset('img/LogoF.jpg') }}" alt="Cargando...">
</div>

<div class="main-content">
    <header class="header d-flex align-items-center justify-content-between">
        <button id="toggleSidebar" class="menu-icon">
            &#9776;
        </button>
        <h1 class="mx-auto">Bienvenido al Administrador Instituto Universitario Enlace</h1>
        <button id="toggleTheme" class="btn btn-secondary">
            <i class="fas fa-moon"></i>
        </button>
    </header>
    <div class="container mt-5">
        <h2>¡Hola!</h2>
        <p>Bienvenido a tu panel de administración. Desde aquí puedes gestionar la configuración del sistema, acceder al CRUD, revisar informes y más.</p>
        <div class="dashboard-widgets">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ir al Índice de Aspirantes</h5>
                    <p class="card-text">Accede a la sección de aspirantes para gestionar los datos del sistema.</p>
                    <a href="{{ route('aspirantes.index') }}" class="btn btn-primary">Ir al Índice de Aspirantes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
