<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enfermero;
use App\Models\Paciente;
use App\Models\Producto;
use App\Models\Servicios;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::paginate(7); // Obtener todos los pacientes
        $medicos = User::where('role', User::ROL_MEDICO)->paginate(7);
        $secretarios = User::where('role', User::ROL_SECRETARIO)->paginate(7);
        $enfermeros = Enfermero::paginate(7);
        $productos = Producto::paginate(7);
        $servicios = Servicios::paginate(7);
        return view('admin.dashboard', compact('pacientes', 'medicos', 'secretarios', 'enfermeros', 'servicios', 'productos'));
    }
}
