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
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="nav-link text-white" style="background: none; border: none; cursor: pointer;">Cerrar sesión</button>
    </form>
</li>

    </ul>
</div>
