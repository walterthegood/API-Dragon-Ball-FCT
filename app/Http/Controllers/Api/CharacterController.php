<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Http\Resources\CharacterResource; 

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //READ
        $personajes = Character::with(['planet', 'transformations'])->get();

        return CharacterResource::collection($personajes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //CREATE

        $character = Character::create($request->all());
        $character->load(['planet', 'transformations']);
        return CharacterResource::make($character);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //READ By ID
        $personaje = Character::with(['planet', 'transformations'])->findOrFail($id);    
    
        return CharacterResource::make($personaje);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //UPDATE
        $character = Character::findOrFail($id);
        $character->update($request->all());
        $character->load(['planet', 'transformations']);
        return CharacterResource::make($character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //DELETE
        
        $character = Character::findOrFail($id);
        $character->delete();
        return response()->json([
            'message' => 'Personaje eliminado con éxito'
        ], 200);
    }
}
