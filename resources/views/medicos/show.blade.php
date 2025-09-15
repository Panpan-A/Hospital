<x-app-layout>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h2 class="text-center mb-4">Detalle del Médico</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $medico->id_medico }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $medico->nombre }}</li>
            <li class="list-group-item"><strong>Apellido Paterno:</strong> {{ $medico->apellido_pat }}</li>
            <li class="list-group-item"><strong>Apellido Materno:</strong> {{ $medico->apellido_mat }}</li>
        </ul>
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-app-layout> 