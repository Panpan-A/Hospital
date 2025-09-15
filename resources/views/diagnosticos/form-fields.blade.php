<div class="form-floating mb-3">
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion', $diagnostico->descripcion ?? '') }}" required>
    <label for="descripcion">Descripción</label>
    @error('descripcion')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 