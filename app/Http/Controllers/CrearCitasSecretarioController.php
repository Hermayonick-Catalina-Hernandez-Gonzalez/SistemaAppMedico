<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Servicios;
class CrearCitasSecretarioController extends Controller
{
    public function index(Request $request)
    {
        $servicio = $request->input('servicio');
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $servicios = Servicios::all();
        return view('secretario.crear-cita', compact('servicio', 'pacientes','servicios'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pacientes' => 'required|string|max:255',
            'hora' => 'required|date_format:H:i',
            'fecha' => 'required|date',
            'servicio' => 'required|string|max:255',
            'Descripcion' => 'required|string',
        ]);

        Cita::create($validateData);
        return redirect()->route('secretario.crear-cita')->with('success', 'Cita creada con éxito');
    }
}
