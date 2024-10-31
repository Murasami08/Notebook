<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotebookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/notebook', [NotebookController::class, 'index']);
Route::post('/v1/notebook', [NotebookController::class, 'store']);
Route::get('/v1/notebook/{id}', [NotebookController::class, 'show']);
Route::post('/v1/notebook/{id}', [NotebookController::class, 'update']);
Route::delete('/v1/notebook/{id}', [NotebookController::class, 'destroy']);