<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Paciente;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tarjeta::with('paciente');
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', "%$valor%");
        }
        $tarjetas = $query->get();
        return view('tarjetas.index', compact('tarjetas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarjetas.create', [
            'tarjeta' => new Tarjeta,
            'pacientes' => Paciente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hora_entrada' => ['required', 'min:2', 'max:20'],
            'hora_salida' => ['nullable', 'max:20'],
            'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
        ]);

        Tarjeta::create($request->only(['hora_entrada', 'hora_salida', 'id_paciente']));

        session()->flash('status', 'Tarjeta registrada con éxito');
        return to_route('tarjetas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarjeta $tarjeta)
    {
        $tarjeta->load('paciente');
        return view('tarjetas.show', ['tarjeta' => $tarjeta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarjeta $tarjeta)
    {
        return view('tarjetas.edit', [
            'tarjeta' => $tarjeta,
            'pacientes' => Paciente::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarjeta $tarjeta)
    {
        $request->validate([
            'hora_entrada' => ['required', 'min:2', 'max:20'],
            'hora_salida' => ['nullable', 'max:20'],
            'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
        ]);

        $tarjeta->update($request->only(['hora_entrada', 'hora_salida', 'id_paciente']));

        session()->flash('status', 'Tarjeta actualizada con éxito');
        return to_route('tarjetas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarjeta $tarjeta)
    {
        $tarjeta->delete();
        session()->flash('status', 'Tarjeta eliminada con éxito');
        return to_route('tarjetas.index');
    }
}
