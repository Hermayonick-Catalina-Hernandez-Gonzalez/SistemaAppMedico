<?php

use App\Http\Controllers\Admin\AdministradorController;
use App\Http\Controllers\Medico\MedicoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta principal para iniciar sesión
Route::get('/', function() {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Rutas para el medico
Route::middleware(['auth', 'MedicoMiddleware'])->group(function(){
    Route::get('dashboard', [MedicoController::class, 'index'])->name('dashboard');
});

// Rutas para el administrador
Route::middleware(['auth', 'AdministradorMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdministradorController::class, 'index'])->name('admin.dashboard');
});