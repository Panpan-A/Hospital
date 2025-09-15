<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacienteCama;
use App\Models\Paciente;
use App\Models\Cama;

class PacienteCamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacienteCamas = PacienteCama::with(['paciente', 'cama'])->get();
        return view('paciente_camas.index', ['pacienteCamas' => $pacienteCamas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente_camas.create', [
            'pacienteCama' => new PacienteCama,
            'pacientes' => Paciente::all(),
            'camas' => Cama::with('planta')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
            'id_cama' => ['required', 'exists:camas,id_cama'],
            'fecha_ingreso' => ['required', 'date'],
            'fecha_egreso' => ['nullable', 'date'],
        ]);

        $pacienteCama = PacienteCama::create($request->only(['id_paciente', 'id_cama', 'fecha_ingreso', 'fecha_egreso']));

        session()->flash('status', 'Asignación registrada con éxito');
        return to_route('paciente-camas.show', $pacienteCama);
    }

    /**
     * Display the specified resource.
     */
    public function show(PacienteCama $pacienteCama)
    {
        $pacienteCama->load(['paciente', 'cama']);
        return view('paciente_camas.show', ['pacienteCama' => $pacienteCama]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PacienteCama $pacienteCama)
    {
        return view('paciente_camas.edit', [
            'pacienteCama' => $pacienteCama,
            'pacientes' => Paciente::all(),
            'camas' => Cama::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PacienteCama $pacienteCama)
    {
        $request->validate([
            'id_paciente' => ['required', 'exists:pacientes,id_paciente'],
            'id_cama' => ['required', 'exists:camas,id_cama'],
            'fecha_ingreso' => ['required', 'date'],
            'fecha_egreso' => ['nullable', 'date'],
        ]);

        $pacienteCama->update($request->only(['id_paciente', 'id_cama', 'fecha_ingreso', 'fecha_egreso']));

        session()->flash('status', 'Asignación actualizada con éxito');
        return to_route('paciente-camas.show', $pacienteCama);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PacienteCama $pacienteCama)
    {
        $pacienteCama->delete();
        session()->flash('status', 'Asignación eliminada con éxito');
        return to_route('paciente-camas.index');
    }
}