<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planet;
use App\Http\Resources\PlanetResource;
use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;


class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PlanetResource::collection(Planet::all());    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanetRequest $request)
    {
        $planet = Planet::create($request->validated());
        return PlanetResource::make($planet);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planet = Planet::with('characters')->findOrFail($id);
        return PlanetResource::make($planet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanetRequest $request, $id)
    {
        $planet = Planet::findOrFail($id);
        $planet->update($request->validated());
        return PlanetResource::make($planet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $planet = Planet::findOrFail($id);
        $planet->delete();
        return response()->json(['message' => 'Planeta borrado'], 200);

    }
}
