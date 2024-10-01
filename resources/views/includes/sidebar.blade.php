<!-- resources/views/includes/sidebar.blade.php -->
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
            <a class="nav-link text-white" href="#ofertaEducativaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Oferta Educativa</a>
            <ul class="collapse list-unstyled" id="ofertaEducativaSubmenu">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('servicios.index') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('modalidades.index') }}">Modalidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('programas.index') }}">Programas</a>
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