<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Paciente::query();
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', "%$valor%");
        }
        $pacientes = $query->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create', ['paciente' => new Paciente]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required', 'min:2'],
            'apellido_mat' => ['required', 'min:2'],
            'nss' => ['required', 'min:5', 'max:20', 'unique:pacientes,nss'],
            'fecha' => ['required', 'date'],
        ]);

        Paciente::create([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),
            'nss' => $request->input('nss'),
            'fecha' => $request->input('fecha'),
        ]);

        session()->flash('status', 'Paciente Registrado con éxito');
        return to_route('pacientes.index');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', ['paciente' => $paciente]);
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', ['paciente' => $paciente]);
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required', 'min:2'],
            'apellido_mat' => ['required', 'min:2'],
            'nss' => ['required', 'min:5', 'max:20', 'unique:pacientes,nss,' . $paciente->id_paciente . ',id_paciente'],
            'fecha' => ['required', 'date'],
        ]);

        $paciente->update([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),
            'nss' => $request->input('nss'),
            'fecha' => $request->input('fecha'),
        ]);

        session()->flash('status', 'Paciente actualizado con éxito');
        return to_route('pacientes.index');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        session()->flash('status', 'Paciente eliminado con éxito');
        return to_route('pacientes.index');
    }

    public function search(Request $request)
    {
        $pacientes = [];

        if ($request->input('busqueda') == "nombre") {
            $pacientes = DB::table('pacientes')
                ->where('pacientes.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('pacientes.apellido_pat', 'asc')
                ->orderBy('pacientes.apellido_mat', 'asc')
                ->orderBy('pacientes.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $pacientes = DB::table('pacientes')
                ->where('pacientes.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('pacientes.apellido_pat', 'asc')
                ->orderBy('pacientes.apellido_mat', 'asc')
                ->orderBy('pacientes.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "materno") {
            $pacientes = DB::table('pacientes')
                ->where('pacientes.apellido_mat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('pacientes.apellido_pat', 'asc')
                ->orderBy('pacientes.apellido_mat', 'asc')
                ->orderBy('pacientes.nombre', 'asc')
                ->get();
        }

        return view('pacientes.search', ['pacientes' => $pacientes]);
    }
}

