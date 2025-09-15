<x-bootstrap-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 main-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Carrusel de Servicios --}}
            <div class="mb-5">
                <h3 class="text-center mb-4">Nuestros Servicios</h3>
                <div id="serviciosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicadores -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <!-- Servicio 1 -->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border-0 shadow">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/consultas.jpg') }}" class="img-fluid rounded mb-4" style="height: 300px; object-fit: cover; width: 100%;" alt="Consulta Médica General">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <i class="fas fa-user-md fa-4x text-primary mb-4"></i>
                                                        <h2 class="card-title mb-4">Consulta Médica General</h2>
                                                        <p class="card-text lead mb-4">Atención médica integral para toda la familia, con profesionales altamente calificados y tecnología de última generación.</p>
                                                        <ul class="list-unstyled text-start mb-4">
                                                            <li><i class="fas fa-check text-success me-2"></i> Diagnóstico preciso</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Tratamiento personalizado</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Seguimiento continuo</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Servicio 2 -->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border-0 shadow">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/corazon.jpg') }}" class="img-fluid rounded mb-4" style="height: 300px; object-fit: cover; width: 100%;" alt="Servicio de Cardiología">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <i class="fas fa-heartbeat fa-4x text-primary mb-4"></i>
                                                        <h2 class="card-title mb-4">Cardiología</h2>
                                                        <p class="card-text lead mb-4">Servicios especializados en el cuidado del corazón y sistema cardiovascular.</p>
                                                        <ul class="list-unstyled text-start mb-4">
                                                            <li><i class="fas fa-check text-success me-2"></i> Electrocardiogramas</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Pruebas de esfuerzo</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Monitoreo cardíaco</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Servicio 3 -->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border-0 shadow">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/pediatria.jpg') }}" class="img-fluid rounded mb-4" style="height: 300px; object-fit: cover; width: 100%;" alt="Servicio de Pediatría">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <i class="fas fa-stethoscope fa-4x text-primary mb-4"></i>
                                                        <h2 class="card-title mb-4">Pediatría</h2>
                                                        <p class="card-text lead mb-4">Atención especializada para los más pequeños de la familia.</p>
                                                        <ul class="list-unstyled text-start mb-4">
                                                            <li><i class="fas fa-check text-success me-2"></i> Control de crecimiento</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Vacunación</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Desarrollo infantil</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Servicio 4 -->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border-0 shadow">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/odontologia.jpg') }}" class="img-fluid rounded mb-4" style="height: 300px; object-fit: cover; width: 100%;" alt="Servicio de Odontología">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <i class="fas fa-tooth fa-4x text-primary mb-4"></i>
                                                        <h2 class="card-title mb-4">Odontología</h2>
                                                        <p class="card-text lead mb-4">Cuidado integral de tu salud dental.</p>
                                                        <ul class="list-unstyled text-start mb-4">
                                                            <li><i class="fas fa-check text-success me-2"></i> Limpieza dental</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Ortodoncia</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Cirugía dental</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Servicio 5 -->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border-0 shadow">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/urgencias.jpg') }}" class="img-fluid rounded mb-4" style="height: 300px; object-fit: cover; width: 100%;" alt="Servicio de Urgencias">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <i class="fas fa-ambulance fa-4x text-primary mb-4"></i>
                                                        <h2 class="card-title mb-4">Urgencias 24/7</h2>
                                                        <p class="card-text lead mb-4">Atención inmediata para emergencias médicas.</p>
                                                        <ul class="list-unstyled text-start mb-4">
                                                            <li><i class="fas fa-check text-success me-2"></i> Servicio de ambulancia</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Atención inmediata</li>
                                                            <li><i class="fas fa-check text-success me-2"></i> Equipo de emergencia</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controles -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#serviciosCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#serviciosCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>

            {{-- Tarjetas de Acceso Rápido --}}
            <div class="mt-5">
                <h3 class="text-center mb-4">Accesos Rápidos</h3>
                <div class="row">
                    <!-- Médicos -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <a href="{{ route('medicos.index') }}" class="text-decoration-none text-dark">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                                    <h4 class="card-title">Médicos</h4>
                                    <p class="card-text">Gestión del personal médico.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Pacientes -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-body text-center p-4">
                                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="card-title">Pacientes</h4>
                                <p class="card-text">Gestión de pacientes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Consultas -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <a href="{{ route('consultas.index') }}" class="text-decoration-none text-dark">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-stethoscope fa-3x text-primary mb-3"></i>
                                    <h4 class="card-title">Consultas</h4>
                                    <p class="card-text">Gestión de consultas médicas.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Camas -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <a href="{{ route('camas.index') }}" class="text-decoration-none text-dark">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-procedures fa-3x text-primary mb-3"></i>
                                    <h4 class="card-title">Camas</h4>
                                    <p class="card-text">Gestión de camas hospitalarias.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Plantas -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <a href="{{ route('plantas.index') }}" class="text-decoration-none text-dark">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-building fa-3x text-primary mb-3"></i>
                                    <h4 class="card-title">Plantas</h4>
                                    <p class="card-text">Administración de plantas hospitalarias.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjetas -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow">
                            <a href="{{ route('tarjetas.index') }}" class="text-decoration-none text-dark">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-id-card fa-3x text-primary mb-3"></i>
                                    <h4 class="card-title">Tarjetas</h4>
                                    <p class="card-text">Gestión de tarjetas de visita.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>