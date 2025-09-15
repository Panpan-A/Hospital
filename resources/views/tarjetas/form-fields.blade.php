<div class="form-floating mb-3">
    <input type="text" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="Hora de Entrada" value="{{ old('hora_entrada', $tarjeta->hora_entrada ?? '') }}" required>
    <label for="hora_entrada">Hora de Entrada</label>
    @error('hora_entrada')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="hora_salida" name="hora_salida" placeholder="Hora de Salida" value="{{ old('hora_salida', $tarjeta->hora_salida ?? '') }}">
    <label for="hora_salida">Hora de Salida</label>
    @error('hora_salida')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="id_paciente" name="id_paciente" placeholder="ID Paciente" value="{{ old('id_paciente', $tarjeta->id_paciente ?? '') }}" required>
    <label for="id_paciente">ID Paciente</label>
    @error('id_paciente')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 