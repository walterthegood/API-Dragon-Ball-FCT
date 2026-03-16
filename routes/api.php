<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CharacterController; 
use App\Http\Controllers\Api\PlanetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/personajes', [CharacterController::class, 'index']);

Route::get('/personajes/{id}', [CharacterController::class, 'show']);
Route::post('/personajes', [CharacterController::class, 'store']);
Route::put('/personajes/{id}', [CharacterController::class, 'update']);
Route::delete('/personajes/{id}', [CharacterController::class, 'destroy']);

Route::apiResource('planetas', PlanetController::class);