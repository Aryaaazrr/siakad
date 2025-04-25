<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'apiLogin'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    })->name('api.user');

    Route::get('portofolio', [PortofolioController::class, 'apiPortofolio']);
    Route::post('portofolio', [PortofolioController::class, 'apiStore']);
    Route::put('portofolio/{id}', [PortofolioController::class, 'apiUpdate']);
    Route::delete('portofolio/{id}', [PortofolioController::class, 'apiDelete']);

    Route::post('logout', [AuthController::class, 'apiLogout'])->name('api.logout');
});