<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Http\Resources\CharacterResource; 
use App\Http\Requests\UpdateCharacterRequest;

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
    public function store(StoreCharacterRequest $request)
    {
        
        $planetName = $request->input('originPlanet.name');
        $planet = \App\Models\Planet::where('name', $planetName)->first();

        $characterData = $request->except(['originPlanet', 'transformations']);

        $characterData['planet_id'] = $planet->id;

        $character = Character::create($characterData);

        $transformationsData = $request->input('transformations', []);
        if (!empty($transformationsData)) {
            $character->transformations()->createMany($transformationsData);
        }
   
        $character->load(['planet', 'transformations']);

        return response() -> json($character); 
        // CharacterResource::make($character);
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
    public function update(UpdateCharacterRequest $request, $id)
    {
        //UPDATE
        $character = Character::findOrFail($id);
        $characterData = $request->except(['originPlanet', 'transformations']); 
        

        if ($request->has('originPlanet.name')) {
            $planetName = $request->input('originPlanet.name');
            $planet = \App\Models\Planet::where('name', $planetName)->first();
            
            $characterData['planet_id'] = $planet->id;
        }
        
        $character->update($characterData);
        
        if ($request->has('transformations')) {
            $character->transformations()->delete();
            $character->transformations()->createMany($request->input('transformations'));
        }


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
