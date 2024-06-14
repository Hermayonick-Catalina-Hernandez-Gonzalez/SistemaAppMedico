<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        // Se obtiene todos los pacientes
        $pacientes = Paciente::all();

        //* Retorna la vista con los pacientes
        return view('admin.dashboard', compact('pacientes'));
        
    }
}
