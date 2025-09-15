<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantas = Planta::get();
        return view('plantas.index', ['plantas' => $plantas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plantas.create', ['planta' => new Planta]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:50'],
        ]);

        $planta = Planta::create([
            'nombre' => $request->input('nombre'),
        ]);

        session()->flash('status', 'Planta registrada con éxito');
        return to_route('plantas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planta $planta)
    {
        return view('plantas.show', ['planta' => $planta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planta $planta)
    {
        return view('plantas.edit', ['planta' => $planta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planta $planta)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:50'],
        ]);

        $planta->update([
            'nombre' => $request->input('nombre'),
        ]);

        session()->flash('status', 'Planta actualizada con éxito');
        return to_route('plantas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planta $planta)
    {
        $planta->delete();
        session()->flash('status', 'Planta eliminada con éxito');
        return to_route('plantas.index');
    }
}
