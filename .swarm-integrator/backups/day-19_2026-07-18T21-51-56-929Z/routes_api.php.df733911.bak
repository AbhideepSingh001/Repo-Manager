<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// SWARM: swarm-api-routes
Route::prefix('orchestrator')->group(function () {
    Route::post('/dispatch', [App\Http\Controllers\OrchestratorController::class, 'dispatch']);
    Route::get('/batch/{batchId}/status', [App\Http\Controllers\OrchestratorController::class, 'batchStatus']);
    Route::post('/batch/{batchId}/retry', [App\Http\Controllers\OrchestratorController::class, 'retryBatch']);
});
