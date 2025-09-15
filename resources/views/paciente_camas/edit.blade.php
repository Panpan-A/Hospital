<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Relación Paciente-Cama') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('paciente-camas.update', $pacienteCama) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="id_paciente" class="block text-gray-700">Paciente</label>
                            <select name="id_paciente" id="id_paciente" class="form-select" required>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id_paciente }}" @if($pacienteCama->id_paciente == $paciente->id_paciente) selected @endif>{{ $paciente->nombre }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="id_cama" class="block text-gray-700">Cama</label>
                            <select name="id_cama" id="id_cama" class="form-select" required>
                                @foreach($camas as $cama)
                                    <option value="{{ $cama->id_cama }}" @if($pacienteCama->id_cama == $cama->id_cama) selected @endif>{{ $cama->nombre ?? $cama->id_cama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_ingreso" class="block text-gray-700">Fecha de Ingreso</label>
                            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-input" value="{{ $pacienteCama->fecha_ingreso }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_egreso" class="block text-gray-700">Fecha de Egreso</label>
                            <input type="date" name="fecha_egreso" id="fecha_egreso" class="form-input" value="{{ $pacienteCama->fecha_egreso }}">
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('paciente-camas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 