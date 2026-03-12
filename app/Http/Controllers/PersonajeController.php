<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Personaje::with('planeta')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'raza'        => 'required|string|max:255',
            'ki'          => 'nullable|string|max:255',
            'ki_maximo'   => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|string|max:255',
            'afiliacion'  => 'nullable|string|max:255',
            'planeta_id'  => 'nullable|integer|exists:planetas,id',
        ]);

        $personaje = Personaje::create($validated);

        return response()->json($personaje->load('planeta'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        return response()->json($personaje->load('planeta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personaje $personaje)
    {
        $validated = $request->validate([
            'nombre'      => 'sometimes|required|string|max:255',
            'raza'        => 'sometimes|required|string|max:255',
            'ki'          => 'nullable|string|max:255',
            'ki_maximo'   => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|string|max:255',
            'afiliacion'  => 'nullable|string|max:255',
            'planeta_id'  => 'nullable|integer|exists:planetas,id',
        ]);

        $personaje->update($validated);

        return response()->json($personaje->load('planeta'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        $personaje->delete();

        return response()->json(null, 204);
    }
}
