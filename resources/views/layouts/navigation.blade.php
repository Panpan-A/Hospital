<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-1" style="min-height: 48px;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ Auth::check() ? route('dashboard') : url('/') }}" style="font-size: 1.2rem; letter-spacing: 1px;">MediCenter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/nosotros">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/servicios">Servicios</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('medicos.index') }}">Médicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('camas.index') }}">Camas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('plantas.index') }}">Plantas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('consultas.index') }}">Consultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diagnosticos.index') }}">Diagnósticos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tarjetas.index') }}">Tarjetas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paciente-camas.index') }}">Paciente Camas</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
body {
    padding-top: 56px !important; /* Ajusta el espacio para el navbar fijo */
}
.navbar {
    font-size: 0.98rem;
    border-bottom: 1px solid #e5e7eb;
}
.navbar-brand {
    color: #0d6efd !important;
}
.nav-link {
    color: #333 !important;
    transition: color 0.2s;
}
.nav-link.active, .nav-link:focus, .nav-link:hover {
    color: #0d6efd !important;
}
.dropdown-menu {
    font-size: 0.97rem;
}
</style>
