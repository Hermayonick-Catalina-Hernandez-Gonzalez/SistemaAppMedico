<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicios;
use Illuminate\Http\Request;

class RegistroServiciosController extends Controller
{
    public function index()
    {
        return view('admin.registro-servicios');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'medico_id' => 'nullable|exists:users,id'
        ]);

        // Verifica que el usuario seleccionado sea un Médico
        $medico = User::find($validated['medico_id']);
        if (!$medico->isMedico()) {
            return response()->json(['error' => 'El usuario seleccionado no es un médico'], 422);
        }

        // Crear el servicio
        $servicio = Servicios::create($validated);

        return response()->back()->with('success', 'Servicio creado correctamente');
    }
}
