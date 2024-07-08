<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ServicioController::class)->group(function () {
    Route::get('/servicios', 'index')->name('servicios');
    Route::get('/servicio/{id}', 'show')->name('servicio.ver');
    Route::get('/crear-servicio', 'create')->name('crear-servicio');
    Route::post('/servicios', 'store')->name('servicio-guardar');
    Route::get('/servicio/{id}/editar', 'edit')->name('servicio.editar');
    Route::put('/servicio/{id}', 'update')->name('servicio.update');
});

Route::controller(ReservaController::class)->group(function () {
    Route::get('/reservas', 'index')->name('reservas');
});

Route::controller(ProveedorController::class)->group(function () {
    Route::get('/mi-informacion/{id}', 'edit')->name('mi-informacion');
    Route::put('/actualizar/{id}', 'update')->name('proveedor.actualizar');
});

require __DIR__ . '/auth.php';
