<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $medicos = User::where('role', User::ROL_MEDICO)->with('medico')->get(); // Extrae sólo a los usuarios con el Role: Médico
        $secretarios = User::where('role', User::ROL_SECRETARIO)->with('secretario')->get(); // Extrae sólo a los usuarios con el Role: Secretario
        return view('admin.dashboard', compact('pacientes', 'medicos', 'secretarios'));
    }
}
