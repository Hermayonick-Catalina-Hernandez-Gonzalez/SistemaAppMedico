<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroSecretarioADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-secretarios');
    }

    public function registro_secretarios(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'string', 'in:Médico,Secretario,Administrador'],
            'profesion' => ['nullable', 'string', 'max:255', 'required_if:role,Médico'],
        ]);

        try {
            $user = User::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'profesion' => $request->profesion,
            ]);
    
            if ($request->role === 'Médico') {
                $user->medico()->create([
                    'profesion' => $request->profesion,
                ]);
            } elseif ($request->role === 'Secretario') {
                $user->secretario()->create();
            }

            event(new Registered($user));

            // Auth::login($user);

            //session()->flash('success', 'Usuario registrado correctamente');

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Error al registrar el usuario');

            return redirect()->back()->withInput();
        }
    }
}
