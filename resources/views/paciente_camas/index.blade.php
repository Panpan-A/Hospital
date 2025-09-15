<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Paciente Camas') }}
            </h2>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('paciente-camas.create') }}" class="btn btn-primary">Asignacion de cama</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paciente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Ingreso</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Egreso</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($pacienteCamas as $relacion)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $relacion->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $relacion->paciente->nombre }} {{ $relacion->paciente->apellido_pat }} {{ $relacion->paciente->apellido_mat }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Cama #{{ $relacion->cama->id_cama }}<br>
                                            Planta: {{ $relacion->cama->planta->nombre ?? 'Sin planta' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $relacion->fecha_ingreso }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $relacion->fecha_egreso }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('paciente-camas.edit', $relacion) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                            <form action="{{ route('paciente-camas.destroy', $relacion) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta relación?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 