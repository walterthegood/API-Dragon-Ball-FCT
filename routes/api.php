<?php

use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\PlanetaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('planetas', PlanetaController::class);
Route::apiResource('personajes', PersonajeController::class);
