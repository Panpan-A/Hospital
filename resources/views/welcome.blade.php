<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 mb-4">Bienvenido a Mediccenter</h1>
                <p class="lead mb-4">Tu salud es nuestra prioridad. Ofrecemos atención médica especializada con los más altos estándares de calidad.</p>
                <div class="d-flex">
                    <a href="{{ url('/servicios') }}" class="btn btn-primary btn-lg px-5">Nuestros Servicios</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="{{ asset('img/doctor.jpg') }}" class="img-fluid rounded shadow" alt="Clínica Mediccenter">
            </div>
        </div>

        <div class="row mt-5 pt-5">
            <div class="col-12 text-center mb-5">
                <h2>¿Por qué elegirnos?</h2>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                        <h4>Especialistas Calificados</h4>
                        <p>Médicos certificados y en constante actualización profesional.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-medal fa-3x text-primary mb-3"></i>
                        <h4>Calidad Garantizada</h4>
                        <p>Protocolos médicos basados en las últimas investigaciones científicas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                        <h4>Horarios Flexibles</h4>
                        <p>Atención en horarios extendidos y servicio de urgencias 24/7.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>