<?php

use App\Http\Controllers\Admin\AdministradorController;
use App\Http\Controllers\ConsultasMEDICOController;
use App\Http\Controllers\ConsultasSECRETARIOController;
use App\Http\Controllers\CrearCitasMEDICOController;
use App\Http\Controllers\CrearCitasSecretarioController;
use App\Http\Controllers\Medico\MedicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroMedicosADMINController;
use App\Http\Controllers\RegistroPacientesADMINController;
use App\Http\Controllers\RegistroPacientesMEDICOController;
use App\Http\Controllers\RegistroPacientesSECRETARIOController;
use App\Http\Controllers\RegistroSecretarioADMINController;
use App\Http\Controllers\RegistroServiciosController;
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


//* Rutas para el medico
Route::middleware(['auth', 'MedicoMiddleware'])->group(function(){
    Route::get('dashboard', [MedicoController::class, 'index'])->name('dashboard'); //* Vista principal del médico
    Route::get('registro-pacientes', [RegistroPacientesMEDICOController::class, 'index'])->name('registro-pacientes'); //* Vista para registrar pacientes
    Route::post('registro-pacientes', [RegistroPacientesMEDICOController::class, 'registro_paciente'])->name('registro-pacientes.store'); //* POST a registrar pacientes a BD
    Route::get('consultas', [ConsultasMEDICOController::class, 'index'])->name('consultas');
    Route::get('crear-cita', [CrearCitasMEDICOController::class, 'index'])->name('crear-cita');
});

//* Rutas para el administrador
Route::middleware(['auth', 'AdministradorMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdministradorController::class, 'index'])->name('admin.dashboard'); //* Vista principal del administrador
    Route::get('/admin/registro-pacientes', [RegistroPacientesADMINController::class, 'index'])->name('admin.registro-pacientes'); //* Vista para registrar pacientes
    Route::post('/admin/registro-pacientes', [RegistroPacientesADMINController::class, 'registro_paciente'])->name('admin.registro-pacientes.store'); //* POST a registrar pacientes a BD
    Route::get('/admin/registro-medicos', [RegistroMedicosADMINController::class, 'index'])->name('admin.registro-medicos'); //* Vista para registrar médicos
    Route::post('/admin/registro-medicos', [RegistroMedicosADMINController::class, 'registro_medico'])->name('admin.registro-medicos.store'); //* POST a registrar médicos a BD
    Route::get('/admin/registro-secretarios', [RegistroSecretarioADMINController::class, 'index'])->name('admin.registro-secretarios'); //* Vista para registrar secretarios
    Route::post('/admin/registro-secretarios', [RegistroSecretarioADMINController::class, 'registro_secretarios'])->name('admin.registro-secretarios.store'); //* POST a registrar secretarios a BD
    Route::get('/admin/registro-servicios', [RegistroServiciosController::class, 'index'])->name('admin.registro-servicios'); //* Vista para registrar servicios
    Route::post('/admin/registro-servicios', [RegistroServiciosController::class, 'store'])->name('admin.registro-servicios.store'); //* POST a registrar servicios a BD
});


//* Rutas para el secretario
Route::middleware(['auth', 'SecretarioMiddleware'])->group(function(){
    Route::get('/secretario/dashboard', [SecretarioController::class, 'index'])->name('secretario.dashboard'); //* Vista principal del secretario
    Route::get('/secretario/registro-pacientes', [RegistroPacientesSECRETARIOController::class, 'index'])->name('secretario.registro-pacientes'); //* Vista para registrar pacientes
    Route::post('secretario/registro-pacientes', [RegistroPacientesSECRETARIOController::class, 'registro_paciente'])->name('secretario.registro-pacientes.store'); //* POST a registrar pacientes a BD
    Route::get('/secretario/consultas', [ConsultasSECRETARIOController::class, 'index'])->name('secretario.consultas'); //* Vista para consultar pacientes
    Route::get('/secretario/crear-cita', [CrearCitasSecretarioController::class, 'index'])->name('secretario.crear-cita'); //* Vista para crear citas
});
    