<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nss" name="nss" placeholder="NSS" value="{{ old('nss', $paciente->nss ?? '') }}" required maxlength="10" pattern="\d{1,10}" inputmode="numeric" oninput="this.value = this.value.replace(/[^\d]/g, '').slice(0, 10)">
    <label for="nss">NSS</label>
    @error('nss')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $paciente->nombre ?? '') }}" required>
    <label for="nombre">Nombre</label>
    @error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Apellido Paterno" value="{{ old('apellido_pat', $paciente->apellido_pat ?? '') }}" required>
    <label for="apellido_pat">Apellido Paterno</label>
    @error('apellido_pat')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Apellido Materno" value="{{ old('apellido_mat', $paciente->apellido_mat ?? '') }}" required>
    <label for="apellido_mat">Apellido Materno</label>
    @error('apellido_mat')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de Nacimiento" value="{{ old('fecha', $paciente->fecha ?? '') }}" required>
    <label for="fecha">Fecha de Nacimiento</label>
    @error('fecha')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div> 