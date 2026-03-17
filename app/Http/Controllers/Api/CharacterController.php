<?php

namespace App\Http\Controllers\Api;
use OpenApi\Attributes as OA;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Http\Resources\CharacterResource; 
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends Controller
{
    #[OA\Get(
        path: "/api/personajes",
        summary: "Listar todos los personajes",
        tags: ["Personajes"],
        responses: [
            new OA\Response(response: 200, description: "Lista de personajes obtenida con éxito")
        ]
    )]
    public function index()
    {
        //READ
        $personajes = Character::with(['planet', 'transformations'])->get();

        return CharacterResource::collection($personajes);
    }

    #[OA\Post(
        path: "/api/personajes",
        summary: "Crear un nuevo personaje",
        tags: ["Personajes"],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Datos del personaje, incluyendo su planeta y transformaciones",
            content: new OA\JsonContent(
                required: ["name", "ki", "maxKi", "race", "gender", "description", "image", "affiliation", "originPlanet"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Hit"),
                    new OA\Property(property: "ki", type: "string", example: "10000000"),
                    new OA\Property(property: "maxKi", type: "string", example: "50000000"),
                    new OA\Property(property: "race", type: "string", example: "Assassin"),
                    new OA\Property(property: "gender", type: "string", example: "Male"),
                    new OA\Property(property: "description", type: "string", example: "Asesino legendario del Universo 6"),
                    new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/hit.webp"),
                    new OA\Property(property: "affiliation", type: "string", example: "Universe 6"),
                    // Bloque anidado del Planeta

                    new OA\Property(
                        property: "originPlanet",
                        type: "object",
                        required: ["name", "isDestroyed", "description", "image"],
                        properties: [
                            new OA\Property(property: "name", type: "string", example: "Planeta Sadala"),
                            new OA\Property(property: "isDestroyed", type: "boolean", example: false),
                            new OA\Property(property: "description", type: "string", example: "Hogar original de los Saiyans"),
                            new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/sadala.webp")
                        ]
                    ),

                    // Array de transformaciones
                    new OA\Property(
                        property: "transformations",
                        type: "array",
                        items: new OA\Items(
                            type: "object",
                            properties: [
                                new OA\Property(property: "name", type: "string", example: "Orange Piccolo"),
                                new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/super-saiyan.webp"),
                                new OA\Property(property: "ki", type: "string", example: "99999999")
                            ]
                        )
                    )    
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Personaje creado con éxito"),
            new OA\Response(response: 422, description: "Error de validación (ej. El personaje ya existe o el planeta no es válido)")
        ]
    )]

    public function store(StoreCharacterRequest $request)
    {
        
        $planetName = $request->input('originPlanet.name');
        $planet = \App\Models\Planet::where('name', $planetName)->first();

        if (!$planet) {
            return response()->json([
            'message' => "Error: El planeta '$planetName' no existe. Créalo primero."
            ], 422);
        }

        $characterData = $request->except(['originPlanet', 'transformations']);

        $characterData['planet_id'] = $planet->id;

        $character = Character::create($characterData);

        $transformationsData = $request->input('transformations', []);
        if (!empty($transformationsData)) {
            $character->transformations()->createMany($transformationsData);
        }
   
        $character->load(['planet', 'transformations']);

        return response()->json($character->load(['planet', 'transformations']), 201);
    }

    #[OA\Get(
        path: "/api/personajes/{id}",
        summary: "Obtener un personaje por su ID",
        tags: ["Personajes"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "El ID numérico del personaje que quieres buscar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Personaje encontrado y devuelto con éxito"),
            new OA\Response(response: 404, description: "Personaje no encontrado (o eliminado)")
        ]
    )]
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
