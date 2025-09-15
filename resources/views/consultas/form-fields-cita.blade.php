<div class="mb-3">
    <label for="nombre_paciente" class="form-label">Nombre(s) *</label>
    <input type="text" class="form-control @error('nombre_paciente') is-invalid @enderror" 
           id="nombre_paciente" name="nombre_paciente" value="{{ old('nombre_paciente') }}" required>
    @error('nombre_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido_pat_paciente" class="form-label">Apellido Paterno *</label>
    <input type="text" class="form-control @error('apellido_pat_paciente') is-invalid @enderror" 
           id="apellido_pat_paciente" name="apellido_pat_paciente" value="{{ old('apellido_pat_paciente') }}" required>
    @error('apellido_pat_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido_mat_paciente" class="form-label">Apellido Materno *</label>
    <input type="text" class="form-control @error('apellido_mat_paciente') is-invalid @enderror" 
           id="apellido_mat_paciente" name="apellido_mat_paciente" value="{{ old('apellido_mat_paciente') }}" required>
    @error('apellido_mat_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="direccion_paciente" class="form-label">Dirección *</label>
    <textarea class="form-control @error('direccion_paciente') is-invalid @enderror" 
              id="direccion_paciente" name="direccion_paciente" rows="3" required>{{ old('direccion_paciente') }}</textarea>
    @error('direccion_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="correo_paciente" class="form-label">Correo Electrónico *</label>
    <input type="email" class="form-control @error('correo_paciente') is-invalid @enderror" 
           id="correo_paciente" name="correo_paciente" value="{{ old('correo_paciente') }}" required>
    @error('correo_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="motivo_consulta" class="form-label">Motivo de la Consulta *</label>
    <textarea class="form-control @error('motivo_consulta') is-invalid @enderror" 
              id="motivo_consulta" name="motivo_consulta" rows="4" required>{{ old('motivo_consulta') }}</textarea>
    @error('motivo_consulta')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="fecha" class="form-label">Fecha de la Cita *</label>
    <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
           id="fecha" name="fecha" 
           min="{{ $fechaMinima }}" 
           max="{{ $fechaMaxima }}" 
           value="{{ old('fecha') }}" 
           required>
    @error('fecha')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">
        Fecha mínima: {{ \Carbon\Carbon::parse($fechaMinima)->format('d/m/Y') }}
    </small>
</div>

<div class="mb-3">
    <label for="hora" class="form-label">Hora de la Cita *</label>
    <select class="form-control @error('hora') is-invalid @enderror" 
            id="hora" name="hora" required>
        <option value="">Selecciona una hora</option>
    </select>
    @error('hora')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">
        Horarios disponibles de 8:00 AM a 6:00 PM
    </small>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fechaInput = document.getElementById('fecha');
    const horaSelect = document.getElementById('hora');
    
    // Cargar horarios cuando se selecciona una fecha
    fechaInput.addEventListener('change', function() {
        const fecha = this.value;
        if (fecha) {
            cargarHorariosDisponibles(fecha);
        } else {
            horaSelect.innerHTML = '<option value="">Selecciona una hora</option>';
        }
    });
    
    function cargarHorariosDisponibles(fecha) {
        console.log('Cargando horarios para fecha:', fecha);
        
        fetch(`/consultas/horarios/disponibles?fecha=${fecha}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            horaSelect.innerHTML = '<option value="">Selecciona una hora</option>';
            
            if (data.horarios && data.horarios.length > 0) {
                data.horarios.forEach(horario => {
                    const option = document.createElement('option');
                    option.value = horario;
                    option.textContent = horario;
                    horaSelect.appendChild(option);
                });
            } else {
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'No hay horarios disponibles para esta fecha';
                option.disabled = true;
                horaSelect.appendChild(option);
            }
        })
        .catch(error => {
            console.error('Error al cargar horarios:', error);
            horaSelect.innerHTML = '<option value="">Error al cargar horarios</option>';
        });
    }
    
    // Cargar horarios si ya hay una fecha seleccionada
    if (fechaInput.value) {
        cargarHorariosDisponibles(fechaInput.value);
    }
});
</script>
