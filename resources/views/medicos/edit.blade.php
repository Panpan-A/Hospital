<x-app-layout>
    <br>
    <div class="major container">
        <h2>Editar Medico</h2>
        <form action="{{ route('medicos.update', $medico) }}" method="post">
            @csrf
            @method('PATCH')
            @include('medicos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('medicos.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</x-app-layout>
