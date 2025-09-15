<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pacientes.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="query" placeholder="Buscar por NSS, nombre o apellido..." class="form-control" value="{{ request('query') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>

                    {{-- Los resultados de la búsqueda real se mostrarán en pacientes.index --}}
                    <p>Utilice la barra de búsqueda para encontrar pacientes.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 