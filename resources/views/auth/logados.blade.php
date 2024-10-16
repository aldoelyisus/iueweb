<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


@include('includes.sidebar')


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
                        <h5 class="card-title">Ir al CRUD</h5>
                        <p class="card-text">Accede a la sección de CRUD para gestionar los datos del sistema.</p>
                        <a href="crud.php" class="btn btn-primary">Ir al CRUD</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
