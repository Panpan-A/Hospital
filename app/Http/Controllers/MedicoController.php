<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Medico::query();
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', "%$valor%");
        }
        $medicos = $query->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required', 'min:2'],
            'apellido_mat' => ['required', 'min:2'],

        ]);

        Medico::create([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),

        ]);

        session()->flash('status', 'Médico Registrado con éxito');
        return to_route('medicos.index');
    }

   
    public function show(Medico $medico)
    {
        return view('medicos.show', ['medico' => $medico]);
    }

    
    public function edit(Medico $medico)
    {
        return view('medicos.edit', ['medico' => $medico]);
    }

    
    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required', 'min:2'],
            'apellido_mat' => ['required', 'min:2'],

        ]);

        $medico->update([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),

        ]);

        session()->flash('status', 'Médico actualizado con éxito');
        return to_route('medicos.index');
    }

   
    public function destroy(Medico $medico)
    {
        $medico->delete();
        session()->flash('status', 'Médico eliminado con éxito');
        return to_route('medicos.index');
    }

    public function search(Request $request)
    {
        $medicos = [];

        if ($request->input('busqueda') == "nombre") {
            $medicos = DB::table('medicos')
                ->where('medicos.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $medicos = DB::table('medicos')
                ->where('medicos.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "materno") {
            $medicos = DB::table('medicos')
                ->where('medicos.apellido_mat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "especialidad") {
            $medicos = DB::table('medicos')
                ->where('medicos.especialidad', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.nombre', 'asc')
                ->get();
        }

        return view('medicos.search', ['medicos' => $medicos]);
    }
}
