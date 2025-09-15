<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Diagnostico;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Consulta::with(['paciente', 'medico', 'diagnostico']);
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', '%' . $valor . '%');
        }
        $consultas = $query->get();
        return view('consultas.index', ['consultas' => $consultas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tipoCita = $request->get('tipo') === 'cita';
        
        if ($tipoCita) {
            $fechaMinima = Carbon::now()->addDays(3)->format('Y-m-d');
            $fechaMaxima = Carbon::now()->addMonths(3)->format('Y-m-d');
            
            return view('consultas.create', [
                'consulta' => new Consulta,
                'pacientes' => Paciente::all(),
                'medicos' => Medico::all(),
                'diagnosticos' => Diagnostico::all(),
                'tipoCita' => true,
                'fechaMinima' => $fechaMinima,
                'fechaMaxima' => $fechaMaxima,
            ]);
        }
        
        return view('consultas.create', [
            'consulta' => new Consulta,
            'pacientes' => Paciente::all(),
            'medicos' => Medico::all(),
            'diagnosticos' => Diagnostico::all(),
            'tipoCita' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipoCita = $request->get('tipo') === 'cita';
        
        if ($tipoCita) {
            // Validaciones para cita de paciente
            $fechaMinima = Carbon::now()->addDays(3)->format('Y-m-d');
            
            $validated = $request->validate([
                'nombre_paciente' => 'required|string|max:100',
                'apellido_pat_paciente' => 'required|string|max:100',
                'apellido_mat_paciente' => 'required|string|max:100',
                'direccion_paciente' => 'required|string|max:500',
                'correo_paciente' => 'required|email|max:150',
                'motivo_consulta' => 'required|string|max:1000',
                'fecha' => [
                    'required',
                    'date',
                    'after_or_equal:' . $fechaMinima,
                    'before_or_equal:' . Carbon::now()->addMonths(3)->format('Y-m-d')
                ],
                'hora' => 'required|date_format:H:i',
            ]);

            // Verificar disponibilidad del horario
            if (!Consulta::isHorarioDisponibleParaCita($validated['fecha'], $validated['hora'])) {
                return back()->withErrors([
                    'hora' => 'El horario seleccionado no está disponible. Por favor, elija otro horario.'
                ])->withInput();
            }

            // Crear la cita como una consulta especial
            $consultaData = [
                'id_paciente' => 1, // ID temporal
                'id_medico' => 1,   // ID temporal
                'id_diagnostico' => 1, // ID temporal
                'fecha' => $validated['fecha'],
                'hora' => $validated['hora'],
            ];

            // Solo agregar campos si existen en la tabla
            if (Schema::hasColumn('consultas', 'nombre_paciente')) {
                $consultaData['nombre_paciente'] = $validated['nombre_paciente'];
                $consultaData['apellido_pat_paciente'] = $validated['apellido_pat_paciente'];
                $consultaData['apellido_mat_paciente'] = $validated['apellido_mat_paciente'];
                $consultaData['direccion_paciente'] = $validated['direccion_paciente'];
                $consultaData['correo_paciente'] = $validated['correo_paciente'];
                $consultaData['motivo_consulta'] = $validated['motivo_consulta'];
                $consultaData['estado_cita'] = 'pendiente';
                $consultaData['es_cita_paciente'] = true;
            }

            Consulta::create($consultaData);
            session()->flash('status', 'Cita solicitada exitosamente. Te contactaremos pronto para confirmar.');
        } else {
            // Validaciones para consulta médica normal
            $request->validate([
                'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
                'id_medico' => ['required', 'exists:medicos,id_medico'],
                'id_diagnostico' => ['required', 'exists:diagnosticos,id_diagnostico'],
                'fecha' => ['required', 'date'],
                'hora' => ['required', 'min:2', 'max:20'],
            ]);

            Consulta::create($request->only(['id_paciente', 'id_medico', 'id_diagnostico', 'fecha', 'hora']));
            session()->flash('status', 'Consulta registrada con éxito');
        }

        return to_route('consultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        $consulta->load(['paciente', 'medico', 'diagnostico']);
        return view('consultas.show', ['consulta' => $consulta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        return view('consultas.edit', [
            'consulta' => $consulta,
            'pacientes' => Paciente::all(),
            'medicos' => Medico::all(),
            'diagnosticos' => Diagnostico::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
            'id_medico' => ['required', 'exists:medicos,id_medico'],
            'id_diagnostico' => ['required', 'exists:diagnosticos,id_diagnostico'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'min:2', 'max:20'],
        ]);

        $consulta->update($request->only(['id_paciente', 'id_medico', 'id_diagnostico', 'fecha', 'hora']));

        session()->flash('status', 'Consulta actualizada con éxito');
        return to_route('consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        session()->flash('status', 'Consulta eliminada con éxito');
        return to_route('consultas.index');
    }


    /**
     * Obtener horarios disponibles para una fecha específica
     */
    public function getHorariosDisponibles(Request $request)
    {
        try {
            $fecha = $request->input('fecha');
            
            if (!$fecha) {
                return response()->json(['error' => 'Fecha requerida'], 400);
            }

            // Verificar que la fecha sea válida y al menos 3 días en el futuro
            $fechaCita = Carbon::parse($fecha);
            $fechaMinima = Carbon::now()->addDays(3);
            
            if ($fechaCita < $fechaMinima) {
                return response()->json(['error' => 'La fecha debe ser al menos 3 días en el futuro'], 400);
            }

            // Verificar si los campos existen antes de usar el método
            if (Schema::hasColumn('consultas', 'es_cita_paciente')) {
                $horariosDisponibles = Consulta::getHorariosDisponiblesParaCita($fecha);
            } else {
                // Fallback: generar horarios básicos si los campos no existen
                $horariosDisponibles = [];
                for ($hora = 8; $hora < 18; $hora++) {
                    $horariosDisponibles[] = sprintf('%02d:00', $hora);
                }
            }
            
            return response()->json(['horarios' => $horariosDisponibles]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
