<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

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

/*Route::get('/tickets', [TiketController::class, 'index']);
Route::get('/tickets/{id}', [TiketController::class, 'show']);
Route::post('/tickets', [TiketController::class, 'store']);
Route::put('/tickets/{id}', [TiketController::class, 'update']);
Route::delete('/tickets{id}', [TiketController::class, 'destroy']);*/

Route::resource('tickets', TiketController::class)->except(
    ['create','edit']
);
