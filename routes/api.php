<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index']); // Get all tasks
    Route::post('/', [TaskController::class, 'store']); // Create a new task
    Route::get('/{id}', [TaskController::class, 'show']); // Get a specific task
    Route::put('/{id}', [TaskController::class, 'update']); // Update a task
    Route::delete('/{id}', [TaskController::class, 'destroy']); // Delete a task
});