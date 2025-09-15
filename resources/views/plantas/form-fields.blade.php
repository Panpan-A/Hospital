<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $planta->nombre ?? '') }}" required>
    <label for="nombre">Nombre</label>
    @error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 