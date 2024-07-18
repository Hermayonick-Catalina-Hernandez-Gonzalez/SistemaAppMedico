<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicios;
use Illuminate\Http\Request;

class RegistroServiciosController extends Controller
{
    public function index()
    {
        $medicos = User::where('role', User::ROL_MEDICO)->paginate(7);

        return view('admin.registro-servicios', compact('medicos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'medico_id' => 'nullable|exists:users,id', // Valida que el ID del médico exista en la tabla users
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Valida la imagen
        ]);

        // Manejo de imagen
        if ($request->hasFile('imagen')) {
            $content = file_get_contents($request->file('imagen')->getRealPath()); // Obtener el contenido de la imagen como BLOB
        } else {
            $content = null;
        }

        // Crear el servicio con los datos validados
        Servicios::create([
            'content' => $content,
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'medico_id' => $validated['medico_id'],
        ]);

        return redirect()->back()->with('success', 'Servicio registrado con éxito.');
    }
}

