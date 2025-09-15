<x-app-layout>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h2 class="text-center mb-4">Detalle del Paciente</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $paciente->id_paciente }}</li>
            <li class="list-group-item"><strong>NSS:</strong> {{ $paciente->nss }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $paciente->nombre }}</li>
            <li class="list-group-item"><strong>Apellido Paterno:</strong> {{ $paciente->apellido_pat }}</li>
            <li class="list-group-item"><strong>Apellido Materno:</strong> {{ $paciente->apellido_mat }}</li>
            <li class="list-group-item"><strong>Fecha:</strong> {{ $paciente->fecha }}</li>
        </ul>
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-app-layout> 