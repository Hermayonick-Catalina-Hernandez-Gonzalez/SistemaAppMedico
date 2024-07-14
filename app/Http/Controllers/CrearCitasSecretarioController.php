<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Servicios;
use App\Models\User;
use Illuminate\Http\Request;

class CrearCitasSecretarioController extends Controller
{
    public function index(Request $request)
    {
        $servicio = $request->input('servicio');
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $servicios = Servicios::all(); // Obtener todos los servicio
        $medicos = User::where('role', User::ROL_MEDICO)->get(); // Obtener todos los médicos
        $citas = Cita::with('medico')->get(); // Obtener todas las citas
        return view('secretario.crear-cita', compact('servicio', 'pacientes', 'servicios', 'medicos', 'citas'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pacientes' => 'required|string|max:255',
            'hora' => 'required|date_format:H:i',
            'fecha' => 'required|date',
            'servicio' => 'required|string|max:255',
            'medico_id' => 'required|exists:users,id',
            'Descripcion' => 'required|string',
        ]);

        Cita::create($validateData);
        return redirect()->route('secretario.crear-cita')->with('success', 'Cita creada con éxito');
    }
}
