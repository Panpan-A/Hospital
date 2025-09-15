<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-4">Nuestro Equipo</h1>
                <p class="lead mb-4">En Mediccenter contamos con un equipo de profesionales altamente calificados y comprometidos con tu salud.</p>
                <p class="mb-4">Nuestros médicos y especialistas cuentan con amplia experiencia y están en constante actualización para ofrecerte la mejor atención médica.</p>
                <div class="d-flex">
                    <a href="{{ route('servicios') }}" class="btn btn-primary btn-lg px-5">Conoce nuestros servicios</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="{{ asset('img/equipo.jpg') }}" class="img-fluid rounded shadow" alt="Equipo Médico Mediccenter">
            </div>
        </div>

        <div class="row mt-5 pt-5">
            <div class="col-12 text-center mb-5">
                <h2>Nuestros Valores</h2>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                        <h4>Compromiso</h4>
                        <p>Nos dedicamos a brindar la mejor atención médica con profesionalismo y dedicación.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                        <h4>Confianza</h4>
                        <p>Construimos relaciones de confianza con nuestros pacientes basadas en la honestidad y transparencia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-star fa-3x text-primary mb-3"></i>
                        <h4>Excelencia</h4>
                        <p>Buscamos la excelencia en cada aspecto de nuestro servicio médico.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>