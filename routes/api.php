<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

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

//public routes
Route::get('/ticket', [TiketController::class, 'index']);
Route::get('/ticket/{id}', [TiketController::class, 'show']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);

//auth
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*Route::post('/tickets', [TiketController::class, 'store']);
Route::put('/tickets/{id}', [TiketController::class, 'update']);
Route::delete('/tickets{id}', [TiketController::class, 'destroy']);*/

//protected
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('ticket', TiketController::class)->except(
        ['create','edit','index','show']
    );

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::resource('transaksi', TransaksiController::class)->except(
        ['create','edit','index','show']
    );
    
    Route::resource('customer', CustomerController::class)->except(
        ['create','edit','index','show']
    );

});



