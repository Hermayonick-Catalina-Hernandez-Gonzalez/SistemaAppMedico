<?php

use App\Http\Controllers\Admin\AdministradorController;
use App\Http\Controllers\ConsultasMEDICOController;
use App\Http\Controllers\CrearCitasMEDICOController;
use App\Http\Controllers\Medico\MedicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroMedicosADMINController;
use App\Http\Controllers\RegistroPacientesADMINController;
use App\Http\Controllers\RegistroPacientesMEDICOController;
use App\Http\Controllers\RegistroSecretarioADMINController;
use App\Http\Controllers\Secretario\SecretarioController;
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
    Route::get('registro-pacientes', [RegistroPacientesMEDICOController::class, 'index'])->name('registro-pacientes');
    Route::get('consultas', [ConsultasMEDICOController::class, 'index'])->name('consultas');
    Route::get('crear-cita', [CrearCitasMEDICOController::class, 'index'])->name('crear-cita');
});

// Rutas para el administrador
Route::middleware(['auth', 'AdministradorMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdministradorController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/registro-pacientes', [RegistroPacientesADMINController::class, 'index'])->name('admin.registro-pacientes');
    Route::get('/admin/registro-medicos', [RegistroMedicosADMINController::class, 'index'])->name('admin.registro-medicos');
    Route::get('/admin/registro-secretarios', [RegistroSecretarioADMINController::class, 'index'])->name('admin.registro-secretarios');
});


// Rutas para el secretario
Route::middleware(['auth', 'SecretarioMiddleware'])->group(function(){
    Route::get('/secretario/dashboard', [SecretarioController::class, 'index'])->name('secretario.dashboard');
});
    