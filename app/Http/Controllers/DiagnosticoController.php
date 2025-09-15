<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostico;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Diagnostico::query();
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', "%$valor%");
        }
        $diagnosticos = $query->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diagnosticos.create', ['diagnostico' => new Diagnostico]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => ['required', 'min:2', 'max:100'],
        ]);

        Diagnostico::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        session()->flash('status', 'Diagnóstico registrado con éxito');
        return to_route('diagnosticos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnostico $diagnostico)
    {
        return view('diagnosticos.show', ['diagnostico' => $diagnostico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnostico $diagnostico)
    {
        return view('diagnosticos.edit', ['diagnostico' => $diagnostico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnostico $diagnostico)
    {
        $request->validate([
            'descripcion' => ['required', 'min:2', 'max:100'],
        ]);

        $diagnostico->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        session()->flash('status', 'Diagnóstico actualizado con éxito');
        return to_route('diagnosticos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();
        session()->flash('status', 'Diagnóstico eliminado con éxito');
        return to_route('diagnosticos.index');
    }
}
