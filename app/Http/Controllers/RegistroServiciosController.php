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
            'medico_id' => 'nullable|string' // Valida el nombre del medico.
        ]);

        // Manejo de imagen
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $content =  $imageName;
        } else {
            $content = null;
        }

        // Crear el servicio con los datos validados
        Servicios::create([
            'content' => $content,
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'medico_id' => $validated['medico_id'], // Guardar el nombre del médico
        ]);

        return redirect()->back()->with('success', 'Servicio registrado con éxito.');
        
    }
}
