<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Servicios;

class ConsultasSecretarioController extends Controller
{
    public function index(Request $request)
    {;
        $citas = Cita::all();
        return view('secretario.consultas', compact('citas'));
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $servicios = Servicios::all();
        return view('secretario.citas.edit-cita', compact('cita', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->servicio = $request->input('servicio');
        $cita->save();
        return redirect()->route('secretario.consultas')->with('success', 'Cita actualizada con éxito.');
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('secretario.consultas')->with('success', 'Cita eliminada con éxito.');
    }
}
