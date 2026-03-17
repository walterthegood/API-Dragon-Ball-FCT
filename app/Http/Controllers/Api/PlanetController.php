<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planet;
use App\Http\Resources\PlanetResource;
use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;
use OpenApi\Attributes as OA;


class PlanetController extends Controller
{
    #[OA\Get(
        path: "/api/planetas",
        summary: "Obtener todos los planetas",
        tags: ["Planetas"],
         responses: [
             new OA\Response(response: 200, description: "Lista de planetas"),
         ]
     )]
    public function index()
    {
        return PlanetResource::collection(Planet::all());    
    }

    #[OA\Post(
        path: "/api/planetas",
        summary: "Crear un nuevo planeta",
        tags: ["Planetas"],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Datos del nuevo planeta",
            content: new OA\JsonContent(
                required: ["name", "isDestroyed", "description", "image"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Planeta Vegeta 2"),
                    new OA\Property(property: "isDestroyed", type: "boolean", example: true),
                    new OA\Property(property: "description", type: "string", example: "Planeta natal de los saiyajin..."),
                    new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/planeta_vegeta.webp")
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Planeta creado con éxito"),
            new OA\Response(response: 422, description: "Error de validación")
        ]
    )]
    public function store(StorePlanetRequest $request)
    {
        $planet = Planet::create($request->validated());
        return PlanetResource::make($planet);
    }

    
    #[OA\Get(
        path: "/api/planetas/{id}",
        summary: "Obtener un planeta por ID",
        tags: ["Planetas"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "ID del planeta en especifico que quieres obtener",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Planeta encontrado"),
            new OA\Response(response: 404, description: "Planeta no encontrado")
        ]
    )]  
    public function show($id)
    {
        $planet = Planet::with('characters')->findOrFail($id);
        return PlanetResource::make($planet);
    }

  
    #[OA\Put(
        path: "/api/planetas/{id}",
        summary: "Actualizar un planeta existente",
        tags: ["Planetas"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "ID del planeta que quieres actualizar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Datos del planeta a actualizar",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Planeta Vegeta 777"),
                    new OA\Property(property: "isDestroyed", type: "boolean", example: true),
                    new OA\Property(property: "description", type: "string", example: "Planeta natal..."),
                    new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/planeta_vegeta.webp")
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Planeta actualizado con éxito"),
            new OA\Response(response: 404, description: "Planeta no encontrado"),
            new OA\Response(response: 422, description: "Error de validación")
         ]
    )]
    public function update(UpdatePlanetRequest $request, $id)
    {
        $planet = Planet::findOrFail($id);
        $planet->update($request->validated());
        return PlanetResource::make($planet);
    }

    #[OA\Delete(
        path: "/api/planetas/{id}",
        summary: "Eliminar un planeta",
        tags: ["Planetas"],
        parameters: [
            new OA\Parameter(  
                name: "id",
                description: "ID del planeta que quieres eliminar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 8)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Planeta eliminado con éxito"),
            new OA\Response(response: 404, description: "Planeta no encontrado")
        ]
    )]
    public function destroy($id)
    {
        $planet = Planet::findOrFail($id);
        $planet->delete();
        return response()->json(['message' => 'Planeta borrado'], 200);

    }
}
