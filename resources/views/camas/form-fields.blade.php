<div class="form-floating mb-3">
    <select class="form-select" id="id_planta" name="id_planta" required onchange="mostrarIdPlanta()">
        <option value="">Seleccione una planta</option>
        @foreach(\App\Models\Planta::all() as $planta)
            <option value="{{ $planta->id }}" {{ old('id_planta', $cama->id_planta ?? '') == $planta->id ? 'selected' : '' }}>{{ $planta->nombre }}</option>
        @endforeach
    </select>
    <label for="id_planta">Planta</label>
    @error('id_planta')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="id_planta_mostrado" value="" readonly>
    <label for="id_planta_mostrado">ID de la Planta Seleccionada</label>
</div>
<script>
function mostrarIdPlanta() {
    var select = document.getElementById('id_planta');
    var input = document.getElementById('id_planta_mostrado');
    input.value = select.value;
}
document.addEventListener('DOMContentLoaded', function() {
    mostrarIdPlanta();
    document.getElementById('id_planta').addEventListener('change', mostrarIdPlanta);
});
</script> 