<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransformationRequest;
use App\Http\Resources\TransformationResource;
use App\Models\Transformation;
use App\Http\Requests\UpdateTransformationRequest;
use OpenApi\Attributes as OA;

class TransformationController extends Controller
{
    #[OA\Get(
        path: "/api/transformaciones",
        summary: "Obtener todas las transformaciones",
        tags: ["Transformaciones"],
         responses: [
             new OA\Response(response: 200, description: "Lista de transformaciones"),
         ]
     )]
    public function index()
    {
        $t = Transformation::with('character')->get();
        return TransformationResource::collection($t);
    }

 
    #[OA\Post(
        path: "/api/transformaciones",
        summary: "Crear una nueva transformación",
        tags: ["Transformaciones"],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Datos de la nueva transformación. Puedes enviarla huérfana o asignarla directamente a un personaje.",            
            content: new OA\JsonContent(
                required: ["name", "ki", "image"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Ultra Ego 2"),
                    new OA\Property(property: "ki", type: "string", example: "150000000"),
                    new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/ultra_ego.webp"),
                    new OA\Property(
                        property: "character_id", 
                        type: "integer", nullable:true ,
                        example: 1, 
                        description: "Opcional. ID del personaje al que pertenece."
                    )
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Transformación creada con éxito"),
            new OA\Response(response: 422, description: "Error de validación")
        ]
    )]
    public function store(StoreTransformationRequest $request)
    {
        $t = Transformation::create($request->validated());

        // Solo cargamos la relación si realmente se envió un character_id
        if ($t->character_id) {
            $t->load('character');
        }

        return new TransformationResource($t);
    }

    #[OA\Get(
        path: "/api/transformaciones/{id}",
        summary: "Obtener una transformación por su ID",
        tags: ["Transformaciones"],
        description: "Devuelve los datos detallados de una transformación específica buscando por su ID.",
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "El ID numérico de la transformación que quieres buscar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 8)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Transformación encontrada y devuelta con éxito"),
            new OA\Response(response: 404, description: "Transformación no encontrada (o eliminada)")
        ]
    )]
    public function show($id)
    {
        $t = Transformation::with('character')->findOrFail($id);
        return TransformationResource::make($t);
    }

    #[OA\Put(
        path: "/api/transformaciones/{id}",
        summary: "Actualizar una transformación existente",
        tags: ["Transformaciones"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "El ID numérico de la transformación que vas a actualizar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        requestBody: new OA\RequestBody(
            required: false,
            description: "Envía solo los campos que quieras actualizar. (Ejemplo: Aumentar el Ki o asignarla a un personaje).",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Super Saiyan 3 (Dominado)"),
                    new OA\Property(property: "ki", type: "string", example: "500000000"),
                    new OA\Property(property: "image", type: "string", example: "https://ejemplo.com/ssj3_dominado.webp"),
                    new OA\Property(
                        property: "character_id", 
                        type: "integer", 
                        nullable: true, 
                        example: 1, 
                        description: "ID del personaje para asignarla, o null para dejarla huérfana."
                    )
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Transformación actualizada con éxito"),
            new OA\Response(response: 404, description: "Transformación no encontrada"),
            new OA\Response(response: 422, description: "Error de validación")
        ]
    )]
    public function update(UpdateTransformationRequest $request, $id)
    {
        $t = Transformation::findOrFail($id);
        $t->update($request->validated());
        return TransformationResource::make($t->load('character'));
    }

    #[OA\Delete(
        path: "/api/transformaciones/{id}",
        summary: "Eliminar una transformación",
        description: "Elimina la transformación indicada por su ID de la base de datos.",
        tags: ["Transformaciones"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "El ID numérico de la transformación que vas a eliminar",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Transformación eliminada con éxito"),
            new OA\Response(response: 404, description: "Transformación no encontrada (o ya estaba eliminada)")
        ]
    )]
    public function destroy(string $id)
    {
        $t = Transformation::findOrFail($id);
        $t->delete();
        return response()->json(['message' => 'Transformacion eliminada'], 200);
    }
}
