<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div id="sidebar" class="sidebar">
        <!-- Contenido del sidebar -->
        <div class="logo">
            <img src="img/Logo_IUE.png" alt="Logotipo" class="logo-img">
        </div>
        <h3 class="sidebar-title">Sistema de Configuración</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <h5 class="nav-section-title">Interfaz</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="crud.php">CRUD</a>
            </li>
            <div class="mt-auto"></div>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Cerrar sesión</a>
            </li>
        </ul>
    </div>


    <div class="main-content">
        <header class="header d-flex align-items-center justify-content-between">
            <button id="toggleSidebar" class="btn btn-primary">
                <i class="fas fa-bars menu-icon"></i>
            </button>
            <h1 class="mx-auto">CRUD - Sistema de Configuración</h1>
            <button id="toggleTheme" class="btn btn-secondary">
                <i class="fas fa-moon"></i>
            </button>
        </header>
        <div class="container mt-5">
            <h2>Sección CRUD</h2>
            <!-- Contenido del CRUD -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
