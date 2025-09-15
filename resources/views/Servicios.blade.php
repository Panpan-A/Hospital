<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-4">Nuestros Servicios</h1>
                <p class="lead">Ofrecemos una amplia gama de servicios médicos de alta calidad para cuidar de tu salud.</p>
            </div>
        </div>
        <div id="serviciosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#serviciosCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
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
</x-bootstrap-layout>