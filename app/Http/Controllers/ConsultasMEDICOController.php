<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Enfermero;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Producto;
use App\Models\Servicios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultasMEDICOController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $servicios = Servicios::all();
            $productos = Producto::all();
            $pacientes = Paciente::all();
            $enfermeros = Enfermero::all();
            $medicoId = Auth::user()->id;
            $medicos = User::where('role', User::ROL_MEDICO)->get(); // Obtener todos los médicos

            $pacienteIdSeleccionado = $request->input('paciente_id');
            $pacienteSeleccionado = Paciente::find($pacienteIdSeleccionado);

            return view('medico.consultas', compact('servicios', 'productos', 'pacientes', 'enfermeros', 'pacienteSeleccionado', 'medicoId', 'medicos'));
        }

        return redirect()->route('login');
    }


    public function storeConsulta(Request $request)
    {
        /*$validateData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:users,id',
            'motivo_consulta' => 'nullable|string',
            'notas_padecimiento' => 'nullable|string',
            'edad' => 'required|integer|max:3',
            'talla' => 'required|numeric|max:3',
            'temperatura' => 'required|numeric|max:3',
            'peso' => 'required|numeric|max:3',
            'frecuencia_cardiaca' => 'required|string|max:7',
            'alergias' => 'nullable|string|max:255',
            'diagnostico' => 'nullable|string|max:255',
            'solicitar_estudios' => 'nullable|string|max:255',
            'indicaciones_estudios' => 'nullable|string|max:255',
            'medicacion' => 'nullable|string|max:255',
            'cantidad' => 'nullable|string|max:255',
            'frecuencia' => 'nullable|string|max:255',
            'duracion' => 'nullable|string|max:255',
            'notas_receta' => 'nullable|string|max:255',
        ]);*/

         // Crear la consulta
         Consulta::create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'motivo_consulta' => $request->motivo_consulta,
            'notas_padecimiento' => $request->notas_padecimiento,
            'edad' => $request->edad,
            'talla' => $request->talla,
            'temperatura' => $request->temperatura,
            'peso' => $request->peso,
            'frecuencia_cardiaca' => $request->frecuencia_cardiaca,
            'alergias' => $request->alergias,
            'diagnostico' => $request->diagnostico,
            'solicitar_estudios' => $request->solicitar_estudios,
            'indicaciones_estudios' => $request->indicaciones_estudios,
            'medicacion' => $request->medicacion,
            'cantidad' => $request->cantidad,
            'frecuencia' => $request->frecuencia,
            'duracion' => $request->duracion,
            'notas_receta' => $request->notas_receta,
        ]);
        return redirect()->route('dashboard')->with('success', 'Consulta creada con éxito');
    }

    public function show($paciente_id)
    {
        $consultas = Consulta::where('paciente_id', $paciente_id)->get();
        $paciente = Paciente::findOrFail($paciente_id);
        return view('medico.ver-consulta', compact('consultas', 'paciente'));
    }
}
