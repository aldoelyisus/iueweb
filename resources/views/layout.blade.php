<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="{{ asset('img/admin_fiveicon.png') }}" type="image/x-icon">
</head>
<body>

<div id="sidebar" class="sidebar">
    <!-- Contenido del sidebar -->
    <div class="logo">
        <img src="{{ asset('img/Logo_IUE.png') }}" alt="Logotipo" class="logo-img">
    </div>
    <h3 class="sidebar-title">Sistema de Configuración</h3>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logados') }}">Inicio</a>
        </li>
        <li class="nav-item">
            <h5 class="nav-section-title">Interfaz</h5>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#ofertaEducativaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Oferta Educativa</a>
            <ul class="collapse list-unstyled" id="ofertaEducativaSubmenu">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('servicios.index') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('modalidades.index') }}">Modalidades</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('crud') }}">CRUD</a>
        </li>
        <div class="mt-auto"></div>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf <!--token de seguridad -->
                <button type="submit" class="nav-link text-white" style="background: none; border: none; cursor: pointer;">Cerrar sesión</button>
            </form>
        </li>
    </ul>
</div>

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
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>