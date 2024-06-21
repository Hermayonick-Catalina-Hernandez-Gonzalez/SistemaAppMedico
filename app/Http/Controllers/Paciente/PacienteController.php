<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        // Se obtiene todos los pacientes
        $pacientes = Paciente::all();

        //* Retorna la vista con los pacientes
        return view('admin.dashboard', compact('pacientes'));
        
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->only('nombre', 'apellido', 'telefono', 'email'));

        return redirect()->route('admin.dashboard')->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Paciente eliminado correctamente');
    }
}
