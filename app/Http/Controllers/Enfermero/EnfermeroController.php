<?php

namespace App\Http\Controllers\Enfermero;

use App\Http\Controllers\Controller;
use App\Models\Enfermero;
use Illuminate\Http\Request;

class EnfermeroController extends Controller
{
    public function index()
    {
        // Obtencion de los pacientes
        $enfermeros = Enfermero::all();

        //* Retorna la vista con los enfermeros
        return view('admin.dashboard', compact('enfermeros'));
        
    }

    public function edit($id)
    {
        $enfermero = Enfermero::findOrFail($id);
        return view('admin.enfermeros.edit', compact('enfermero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $enfermero = Enfermero::findOrFail($id);
        $enfermero->update($request->only('nombre', 'apellido', 'telefono', 'email'));

        return redirect()->route('admin.dashboard')->with('success', 'Enfermero actualizado correctamente');
    }

    public function destroy($id)
    {
        $enfermero = Enfermero::findOrFail($id);
        $enfermero->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Enfermero eliminado correctamente');
    }
}
