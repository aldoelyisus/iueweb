<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
    <!-- Icono FiveIcon -->
    <link rel="icon" href="{{ asset('img/LogoF.jpg') }}" sizes="32x32" type="image/png">

    <!-- Enlace para Iconos -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Instituto Universitario Enlace - Contacto</title>

    
   
    @vite('resources/css/app.css')
    @vite('resources/css/noticias.css')
    @vite('resources/js/app.js')

    <meta property="og:title" content="Instituto Universitario Enlace">
    <meta property="og:description" content="Bienvenido al Instituto Universitario Enlace, donde la educación en línea se encuentra con la innovación y el desarrollo profesional.">
    <meta property="og:image" content="https://raw.githubusercontent.com/AlexGlez1489/Porfolio-V2/main/Captura%20de%20pantalla%202024-09-04%20001920.png">
    <meta property="og:url" content="https://glezdev.com/">
    <meta property="og:type" content="website">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4; /* Color de fondo claro para un diseño minimalista */
        }

     
        
        .main-content {
            max-width: 600px; /* Ancho máximo del formulario */
            margin: 2rem auto; /* Centrar el formulario en la página */
            padding: 2rem;
            background-color: white; /* Fondo blanco para el contenido del formulario */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave para dar profundidad */
        }

        .titulo-contacto {
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
            color: #333; /* Color de texto oscuro para mejor contraste */
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #000; /* Asegúrate de que el color del texto sea visible */
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s; /* Animación para el cambio de color del borde */
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #007bff; /* Color del borde al hacer foco */
            outline: none; /* Eliminar el contorno predeterminado */
        }

        .form-group input::placeholder, .form-group select::placeholder {
            color: #999; /* Color de los placeholders */
            opacity: 1; /* Asegúrate de que sean totalmente opacos */
        }

        .btn-primary {
            background-color: #007bff; /* Color de fondo del botón */
            border: none; /* Sin borde */
            transition: background-color 0.3s; /* Animación para el color de fondo */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Color del botón al pasar el mouse */
        }

        dl, ol, ul {
    margin-top: 0;
    margin-bottom: 0rem;
        }
    </style>
</head>
<body>
@include('includes.navbar')

<br>
<br>
<br>
<div class="main-content">
    <section id="contacto_scroll" class="contenedor-contacto fade-in">
        <h2 class="titulo-contacto side-left">Contáctanos</h2>
        <form id="contact-form" action="{{ route('contacto.enviar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombrecompleto">Nombre Completo</label>
                <input type="text" name="nombrecompleto" id="nombrecompleto" class="form-control" placeholder="Ingresa tu nombre completo" value="{{ old('nombrecompleto') }}">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" placeholder="Ingresa tu edad" value="{{ old('edad') }}">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa tu número de teléfono" value="{{ old('telefono') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="servicio_id">Servicio de Interés</label>
                <select name="servicio_id" id="servicio_id" class="form-control">
                    <option value="" disabled selected>Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}">
                            {{ $servicio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="programas-container" style="display: none;">
                <label for="programa_id">Programa de Interés</label>
                <select name="programa_id" id="programa_id" class="form-control">
                    <option value="" disabled selected>Seleccione un programa</option>
                    <!-- Opciones de programas se llenarán dinámicamente -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>
</div>

<!-- Footer -->
@include('includes.footer')
<!-- Fin de footer -->

<!-- scroll reveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<div id="app"></div>
<script src="/scripts.js"></script> <!-- Ruta corregida para scripts.js -->

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            let isValid = true; // Inicializar la validez en verdadero

            // Comprobar que todos los campos requeridos estén llenos
            const fields = [
                'nombrecompleto',
                'edad',
                'telefono',
                'email',
                'servicio_id',
            ];

            fields.forEach(function (field) {
                const input = document.getElementById(field);
                if (!input.value) { // Si el campo está vacío
                    isValid = false; // Cambiar la validez a falso
                    input.classList.add('is-invalid'); // Agregar clase de error
                } else {
                    input.classList.remove('is-invalid'); // Quitar clase de error si ya está lleno
                }
            });

            // Si no es válido, evita el envío del formulario
            if (!isValid) {
                event.preventDefault(); // Evitar el envío
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Por favor, complete todos los campos requeridos.",
                });
            } else {
                // Si el formulario es válido, muestra la alerta de éxito
                event.preventDefault(); // Evitar el envío para mostrar el alert
                Swal.fire({
                    title: "¡Buen trabajo!",
                    text: "Los datos se han enviado correctamente.",
                    icon: "success"
                })
            }
        });
    });
</script>

</body>
</html>
