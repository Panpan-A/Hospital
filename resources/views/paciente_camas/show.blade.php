<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle Relación Paciente-Cama') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <strong>NSS:</strong> {{ $pacienteCama->paciente->nss }}
                    </div>
                    <div class="mb-4">
                        <strong>Nombre del Paciente:</strong> {{ $pacienteCama->paciente->nombre }} {{ $pacienteCama->paciente->apellido_pat }} {{ $pacienteCama->paciente->apellido_mat }}
                    </div>
                    <div class="mb-4">
                        <strong>Fecha de Nacimiento:</strong> {{ $pacienteCama->paciente->fecha }}
                    </div>
                    <div class="mb-4">
                        <strong>Cama:</strong> #{{ $pacienteCama->cama->id_cama }}
                    </div>
                    <div class="mb-4">
                        <strong>Planta:</strong> {{ $pacienteCama->cama->planta->nombre ?? 'Sin planta' }}
                    </div>
                    <div class="mb-4">
                        <strong>Fecha de Ingreso:</strong> {{ $pacienteCama->fecha_ingreso }}
                    </div>
                    <div class="mb-4">
                        <strong>Fecha de Egreso:</strong> {{ $pacienteCama->fecha_egreso }}
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('paciente-camas.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 