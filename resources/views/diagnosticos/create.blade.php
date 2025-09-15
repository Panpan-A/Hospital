<x-app-layout>
    <br>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h2 class="text-center mb-4">Registrar Diagnóstico</h2>
        <form action="{{ route('diagnosticos.store') }}" method="post">
            @csrf
            @include('diagnosticos.form-fields')
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary me-2">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout> 