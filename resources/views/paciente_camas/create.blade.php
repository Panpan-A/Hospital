<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Relación Paciente-Cama') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('paciente-camas.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="id_paciente" class="block text-gray-700">Paciente</label>
                            <select name="id_paciente" id="id_paciente" class="form-select" required>
                                <option value="">Seleccione un paciente</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id_paciente }}">{{ $paciente->nombre }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="id_cama" class="block text-gray-700">Cama</label>
                            <select name="id_cama" id="id_cama" class="form-select" required>
                                <option value="">Seleccione una cama</option>
                                @foreach($camas as $cama)
                                    <option value="{{ $cama->id_cama }}">
                                        Cama #{{ $cama->id_cama }} - Planta: {{ $cama->planta->nombre ?? 'Sin planta' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_ingreso" class="block text-gray-700">Fecha de Ingreso</label>
                            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-input" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_egreso" class="block text-gray-700">Fecha de Egreso</label>
                            <input type="date" name="fecha_egreso" id="fecha_egreso" class="form-input">
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('paciente-camas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 