<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\PropietariosController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\HotelesHabitacionesController;

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

Route::get('/hoteles', [HotelesController::class,'getDatos']);
Route::post('/hoteles/registrar', [HotelesController::class,'registrar']);
Route::delete('/hoteles/eliminar/{id}', [HotelesController::class,'eliminar']);

Route::get('/hoteleshabitaciones/{id}', [HotelesHabitacionesController::class,'getDatos']);
Route::post('/hoteleshabitaciones/registrar', [HotelesHabitacionesController::class,'registrar']);
Route::delete('/hoteleshabitaciones/eliminar/{id}', [HotelesHabitacionesController::class,'eliminar']);

