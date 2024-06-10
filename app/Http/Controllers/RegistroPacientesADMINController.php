<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class RegistroPacientesADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-pacientes');
    }

    public function registro_paciente(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Paciente::create($validatedData);
        return redirect()->route('registro-pacientes')->with('success', 'Paciente registrado correctamente');
    }
}
