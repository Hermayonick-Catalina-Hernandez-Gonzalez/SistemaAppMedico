<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicios;
use Illuminate\Auth\Events\Registered;
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'medico_id' => 'nullable|exists:users,id'
        ]);

        // Manejo de la imagen
        if($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Verifica si medico_id es proporcionado y, de ser así, que el usuario sea un Médico
        if (!is_null($validated['medico_id'])) {
            $medico = User::find($validated['medico_id']);
            if (!$medico || !$medico->isMedico()) {
                return response()->json(['error' => 'El usuario seleccionado no es un médico'], 422);
            }
        }

        // Crear el servicio con los datos validados
        $servicio = Servicios::create([
            'imagen' => $imageName, // Puede ser 'null
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'medico_id' => $validated['medico_id'] // Puede ser null y está bien
        ]);

        event(new Registered($servicio));

        return redirect()->back()->withInput();
        
    }
}
