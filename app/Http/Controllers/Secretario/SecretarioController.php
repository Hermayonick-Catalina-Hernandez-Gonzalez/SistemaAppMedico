<?php

namespace App\Http\Controllers\Secretario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Servicios;

class SecretarioController extends Controller
{
    public function index(){
        $servicios = Servicios::all(); // Obtener todos los servicios de la base de datos
        return view('secretario.dashboard', compact('servicios'));
    }

    public function edit($id)
    {
        $secretario = User::findOrFail($id);
        return view('admin.secretarios.edit', compact('secretario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('nombre', 'apellido', 'telefono', 'email'));

        return redirect()->route('admin.dashboard')->with('success', 'Secretario actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Secretario eliminado correctamente');
    }
}
