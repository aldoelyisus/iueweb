<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                            
        <title>Admin IUE</title>
                            
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
         <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/admin_fiveicon.png') }}" type="image/x-icon"> <!-- Asegúrate de usar la función asset() de Laravel -->

         <!-- Otros enlaces de estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Opcional para íconos -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

:root {
    --color-barra: #070a4f;
    --negro: #000000;
    --eslogan: #0f2244;
    --blanco: #fff;
    --azul-nav: #171c1f;
    --azul-b: #5fb7ff;
    --bg-color: #1f242d;
    --second-bg-color: #323946;
    --color-principal: #0ef;
    --fuente-principal: 'Poppins', sans-serif;
}

/* Estilos globales */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #e3f2fd, #90caf9); /* Fondo suave con gradiente */
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}

.login-form {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    max-width: 700px; /* Aumentamos el tamaño máximo del contenedor */
    width: 90%; /* Ancho responsivo para pantallas más pequeñas */
}

.login-card {
    background-color: white;
    border-radius: 10px;
    padding: 2rem; /* Ajustamos el padding */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

h3 {
    font-weight: 600;
    color: #333;
    margin-bottom: 1.5rem; /* Separación mayor del título */
}

/* Estilos de input */
.form-control {
    border-radius: 30px;
    padding: 1rem 1.5rem; /* Aumentamos el padding de los inputs */
    border: 1px solid #ccc;
    font-size: 16px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
}

/* Estilos del botón */
.btn-primary {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background: transparent;
    border: .1rem solid var(--color-principal);
    font-size: 1rem;
    margin: 1rem 0;
    transition: .5s ease-out;
    border-radius: 20px;
    padding: .5rem 1rem;
    text-transform: uppercase;
}

.btn-primary:hover {
    background: var(--color-principal);
    color: var(--second-bg-color);
    box-shadow: 0 0 1rem var(--color-principal);
}

.form-check-label {
    font-size: 14px;
    margin-left: 0.5rem; /* Un poco más de separación con el checkbox */
}

.form-group {
    margin-bottom: 1.5rem; /* Aumentamos la separación entre los campos */
}

/* Animación sutil */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success {
    background-color: #28a745;
    color: white;
    padding: 10px;
    border-radius: 5px;
}
        </style>
    </head>
    <body >
        @yield('content')
    </body>
</html>
                            