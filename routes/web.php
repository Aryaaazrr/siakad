<?php

use App\Http\Controllers\AirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('404', [AuthController::class, 'notFound'])->name('not.found');
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store']);

    Route::get('air', [AirController::class, 'index'])->name('air');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('portofolio', [PortofolioController::class, 'index'])->name('portofolio');
        Route::post('portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
        Route::put('portofolio/update', [PortofolioController::class, 'update'])->name('portofolio.update');
        Route::delete('portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');

        Route::get('client', [ClientController::class, 'index'])->name('client');
        Route::post('client', [ClientController::class, 'store'])->name('client.store');
        Route::put('client/update', [ClientController::class, 'update'])->name('client.update');
        Route::delete('client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

        Route::get('blog', [BlogController::class, 'index'])->name('blog');
        Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
        Route::put('blog/update', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
