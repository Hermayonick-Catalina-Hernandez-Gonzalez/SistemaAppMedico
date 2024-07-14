<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    public function index(){
        if(Auth::check()) {
            // Obtiene el id del medico logueado
            $medicoId = Auth::user()->id;

            // Filtra las citas asignadas a este médico
            $citas = Cita::where('medico_id', $medicoId)->get();

            return view('medico.dashboard', compact('citas'));
        }
        
        return redirect()->route('login');
    }

    public function edit($id) 
    {
        $medico = User::with('medico')->findOrFail($id);
        return view('admin.medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'profesion' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('nombre', 'apellido', 'telefono', 'email'));

        $medico = $user->medico;
        $medico->update($request->only('profesion'));

        return redirect()->route('admin.dashboard')->with('success', 'Médico actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Médico eliminado correctamente');
    }
}
