<x-app-layout>
    <br>
    <div class="container mt-5 mb-5" style="background-color: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        @if(isset($tipoCita) && $tipoCita)
            <h2 class="text-center mb-4">Solicitar Cita Médica</h2>
            <div class="mb-4">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                    <strong>Información importante:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        <li>Las citas deben agendarse con al menos 3 días de anticipación</li>
                        <li>Solo se puede agendar una cita por horario</li>
                        <li>Te contactaremos para confirmar tu cita</li>
                    </ul>
                </div>
            </div>
        @else
            <h2 class="text-center mb-4">Registrar Consulta</h2>
        @endif
        
        <form action="{{ route('consultas.store') }}" method="post">
            @csrf
            @if(isset($tipoCita) && $tipoCita)
                <input type="hidden" name="tipo" value="cita">
                @include('consultas.form-fields-cita')
            @else
                @include('consultas.form-fields')
            @endif
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary me-2">
                    @if(isset($tipoCita) && $tipoCita)
                        Solicitar Cita
                    @else
                        Guardar
                    @endif
                </button>
            </div>
        </form>
    </div>
</x-app-layout> 