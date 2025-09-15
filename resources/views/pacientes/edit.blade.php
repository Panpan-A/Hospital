<x-app-layout>
    <br>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h2 class="text-center mb-4">Editar Paciente</h2>
        <form action="{{ route('pacientes.update', $paciente) }}" method="post">
            @csrf
            @method('PATCH')
            @include('pacientes.form-fields')
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout> 