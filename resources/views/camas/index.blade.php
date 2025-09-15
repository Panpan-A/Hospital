<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Camas') }}
            </h2>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('camas.create') }}" class="btn btn-primary">Nueva Cama</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="GET" action="{{ route('camas.index') }}" class="mb-4 d-flex">
                        <select name="campo" class="form-select me-2" required>
                            <option value="id">ID</option>
                            <option value="id_planta">ID Planta</option>
                        </select>
                        <input type="text" name="valor" class="form-control me-2" placeholder="Buscar..." required>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Planta</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($camas as $i => $cama)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $i + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cama->planta->nombre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('camas.edit', $cama) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                            <form action="{{ route('camas.destroy', $cama) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta cama?')">Eliminar</button>
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