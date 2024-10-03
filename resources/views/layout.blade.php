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
    <style>
        #cookieConsent {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #000;
            color: #fff;
            padding: 10px;
            text-align: center;
            display: none;
        }
        #cookieConsent button {
            background: #f1d600;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
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
        @yield('content')
    </div>
</div>

<div id="cookieConsent">
    Este sitio web utiliza cookies para asegurar que obtengas la mejor experiencia. 
    <button onclick="acceptCookies()">Aceptar</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
    function acceptCookies() {
        document.cookie = "cookieConsent=true; max-age=" + 60*60*24*30 + "; path=/";
        document.getElementById('cookieConsent').style.display = 'none';
    }

    window.onload = function() {
        if (!document.cookie.split('; ').find(row => row.startsWith('cookieConsent'))) {
            document.getElementById('cookieConsent').style.display = 'block';
        }
    }
</script>

</body>
</html> 