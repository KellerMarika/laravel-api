<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\PathController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* robe mie per la mappa */
Route::post("world", [PathController::class, "uploadWorldMap"])->name("path");


/* lettura tutti progetti */
Route::get("/projects", [ProjectController::class, 'index']);
/* le api non hanno bisogno di un name*/