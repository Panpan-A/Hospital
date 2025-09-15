<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $medico->nombre ?? '') }}" required>
    <label for="nombre">Nombre</label>
    @error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Apellido Paterno" value="{{ old('apellido_pat', $medico->apellido_pat ?? '') }}" required>
    <label for="apellido_pat">Apellido Paterno</label>
    @error('apellido_pat')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Apellido Materno" value="{{ old('apellido_mat', $medico->apellido_mat ?? '') }}" required>
    <label for="apellido_mat">Apellido Materno</label>
    @error('apellido_mat')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 