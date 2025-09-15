<x-app-layout>
    <br>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h2 class="text-center mb-4">Editar Planta</h2>
        <form action="{{ route('plantas.update', $planta) }}" method="post">
            @csrf
            @method('PUT')
            @include('plantas.form-fields')
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                <a href="{{ route('plantas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout> 