<?php

namespace App\Http\Controllers;

use App\Models\Enfermero;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroEnfermeroController extends Controller
{
    public function index()
    {
        return view('admin.registro-enfermeros');
    }

    public function registro_enfermeros(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'string', 'in:Enfermero'],
        ]);

        try{
            $enfermero = Enfermero::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->role === 'Enfermero') {
                $enfermero->enfermero()->create();
            }

            event(new Registered($enfermero));

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Error al registrar el usuario');

            return redirect()->back()->withInput();
        }
    }
}
