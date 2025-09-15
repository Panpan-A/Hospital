<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cama;
use App\Models\Planta;

class CamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cama::with('planta');
        if ($request->filled('campo') && $request->filled('valor')) {
            $campo = $request->input('campo');
            $valor = $request->input('valor');
            $query->where($campo, 'like', "%$valor%");
        }
        $camas = $query->get();
        return view('camas.index', ['camas' => $camas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camas.create', [
            'cama' => new Cama,
            'plantas' => Planta::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_planta' => ['required', 'exists:plantas,id'],
        ]);

        Cama::create($request->only(['id_planta']));

        session()->flash('status', 'Cama registrada con éxito');
        return to_route('camas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cama $cama)
    {
        $cama->load('planta');
        return view('camas.show', ['cama' => $cama]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cama $cama)
    {
        return view('camas.edit', [
            'cama' => $cama,
            'plantas' => Planta::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cama $cama)
    {
        $request->validate([
            'id_planta' => ['required', 'exists:plantas,id'],
        ]);

        $cama->update($request->only(['id_planta']));

        session()->flash('status', 'Cama actualizada con éxito');
        return to_route('camas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cama $cama)
    {
        $cama->delete();
        session()->flash('status', 'Cama eliminada con éxito');
        return to_route('camas.index');
    }
}
