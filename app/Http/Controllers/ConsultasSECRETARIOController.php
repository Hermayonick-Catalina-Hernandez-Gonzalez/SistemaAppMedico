<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CrearCitasSecretarioController extends Controller
{
    public function index(Request $request)
    {
        $servicio = $request->input('servicio');
        return view('secretario.crear-cita', compact('servicio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pacientes' => 'required|string|max:255',
            'hora' => 'required|date_format:H:i',
            'servicio' => 'required|string|max:255',
            'fecha' => 'required|date',
        ]);

        Cita::create([
            'pacientes' => $request->input('pacientes'),
            'hora' => $request->input('hora'),
            'servicio' => $request->input('servicio'),
            'fecha' => $request->input('fecha'),
        ]);

        return response()->json(['success' => 'Cita creada con éxito']);
    }
}
