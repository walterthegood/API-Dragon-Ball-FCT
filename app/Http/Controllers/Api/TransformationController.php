<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransformationRequest;
use App\Http\Resources\TransformationResource;
use App\Models\Transformation;
use App\Http\Requests\UpdateTransformationRequest;

class TransformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $t = Transformation::with('character')->get();
        return TransformationResource::collection($t);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransformationRequest $request)
    {
        $t = Transformation::create($request->validated());

        // Solo cargamos la relación si realmente se envió un character_id
        if ($t->character_id) {
            $t->load('character');
        }

        return new TransformationResource($t);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $t = Transformation::with('character')->findOrFail($id);
        return TransformationResource::make($t);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransformationRequest $request, $id)
    {
        $t = Transformation::findOrFail($id);
        $t->update($request->validated());
        return TransformationResource::make($t->load('character'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $t = Transformation::findOrFail($id);
        $t->delete();
        return response()->json(['message' => 'Transformacion eliminada'], 200);
    }
}
