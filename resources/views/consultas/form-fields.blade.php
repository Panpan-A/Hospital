<div class="mb-3">
    <label for="id_paciente" class="form-label">Paciente</label>
    <select class="form-select" id="id_paciente" name="id_paciente" required>
        <option value="">Seleccione un paciente</option>
        @foreach(\App\Models\Paciente::all() as $paciente)
            <option value="{{ $paciente->id_paciente }}" {{ old('id_paciente', $consulta->id_paciente ?? '') == $paciente->id_paciente ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
        @endforeach
    </select>
    @error('id_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="id_medico" class="form-label">Médico</label>
    <select class="form-select" id="id_medico" name="id_medico" required>
        <option value="">Seleccione un médico</option>
        @foreach(\App\Models\Medico::all() as $medico)
            <option value="{{ $medico->id_medico }}" {{ old('id_medico', $consulta->id_medico ?? '') == $medico->id_medico ? 'selected' : '' }}>{{ $medico->nombre }}</option>
        @endforeach
    </select>
    @error('id_medico')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="id_diagnostico" class="form-label">Diagnóstico</label>
    <select class="form-select" id="id_diagnostico" name="id_diagnostico" required>
        <option value="">Seleccione un diagnóstico</option>
        @foreach(\App\Models\Diagnostico::all() as $diagnostico)
            <option value="{{ $diagnostico->id_diagnostico }}" {{ old('id_diagnostico', $consulta->id_diagnostico ?? '') == $diagnostico->id_diagnostico ? 'selected' : '' }}>{{ $diagnostico->descripcion }}</option>
        @endforeach
    </select>
    @error('id_diagnostico')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $consulta->fecha ?? date('Y-m-d')) }}" required>
    @error('fecha')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="motivo" class="form-label">Motivo de consulta</label>
    <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo de consulta" value="{{ old('motivo', $consulta->motivo ?? '') }}" required>
    @error('motivo')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="hora" class="form-label">Hora</label>
    <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $consulta->hora ?? date('H:i')) }}" required>
    @error('hora')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 