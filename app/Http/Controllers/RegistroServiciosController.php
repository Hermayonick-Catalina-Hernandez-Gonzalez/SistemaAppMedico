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

        // Verifica si medico_id es proporcionado y, de ser así, que el usuario sea un Médico
        if (!is_null($validated['medico_id'])) {
            $medico = User::find($validated['medico_id']);
            if (!$medico || !$medico->isMedico()) {
                return response()->json(['error' => 'El usuario seleccionado no es un médico'], 422);
            }
        }

        // Crear el servicio con los datos validados
        $servicio = Servicios::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'medico_id' => $validated['medico_id'] // Puede ser null y está bien
        ]);

        return redirect()->back()->withInput();
        
    }
}
