<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Consultas') }}
            </h2>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('consultas.create') }}?tipo=cita" class="btn btn-success me-2">Solicitar Cita</a>
                <a href="{{ route('consultas.create') }}" class="btn btn-primary">Nueva Consulta</a>
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
                    <form method="GET" action="{{ route('consultas.index') }}" class="mb-4 d-flex">
                        <select name="campo" class="form-select me-2" required>
                            <option value="id_consulta">ID</option>
                            <option value="id_paciente">ID Paciente</option>
                            <option value="id_medico">ID Médico</option>
                            <option value="id_diagnostico">ID Diagnóstico</option>
                            <option value="fecha">Fecha</option>
                            <option value="hora">Hora</option>
                        </select>
                        <input type="text" name="valor" class="form-control me-2" placeholder="Buscar..." required>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paciente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnóstico</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($consultas as $consulta)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->id_consulta ?? $consulta->id ?? $consulta->getKey() }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->nombre_completo_paciente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(isset($consulta->es_cita_paciente) && $consulta->es_cita_paciente)
                                                <span class="text-gray-500">Por asignar</span>
                                            @else
                                                {{ $consulta->medico->nombre }} {{ $consulta->medico->apellido_pat }} {{ $consulta->medico->apellido_mat }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(isset($consulta->es_cita_paciente) && $consulta->es_cita_paciente)
                                                <span class="text-gray-500">Por asignar</span>
                                            @else
                                                {{ $consulta->diagnostico->descripcion }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->fecha }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->hora }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(isset($consulta->es_cita_paciente) && $consulta->es_cita_paciente)
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Cita Paciente</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Consulta Médica</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(isset($consulta->es_cita_paciente) && $consulta->es_cita_paciente)
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                    @if(isset($consulta->estado_cita) && $consulta->estado_cita == 'pendiente') bg-yellow-100 text-yellow-800
                                                    @elseif(isset($consulta->estado_cita) && $consulta->estado_cita == 'confirmada') bg-green-100 text-green-800
                                                    @elseif(isset($consulta->estado_cita) && $consulta->estado_cita == 'cancelada') bg-red-100 text-red-800
                                                    @elseif(isset($consulta->estado_cita) && $consulta->estado_cita == 'completada') bg-blue-100 text-blue-800
                                                    @else bg-yellow-100 text-yellow-800
                                                    @endif">
                                                    {{ isset($consulta->estado_cita) ? ucfirst($consulta->estado_cita) : 'Pendiente' }}
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Completada</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                            <form action="{{ route('consultas.destroy', $consulta) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta consulta?')">Eliminar</button>
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