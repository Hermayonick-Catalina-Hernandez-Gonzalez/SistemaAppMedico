<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\User;
use App\Models\Servicios;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::paginate(7);
        $medicos = User::where('role', User::ROL_MEDICO)->paginate(7);
        $secretarios = User::where('role', User::ROL_SECRETARIO)->paginate(7);
        $servicios = Servicios::all();
        $productos = Producto::paginate(10);
        return view('admin.dashboard', compact('pacientes', 'medicos', 'secretarios', 'servicios', 'productos'));
    }
}

