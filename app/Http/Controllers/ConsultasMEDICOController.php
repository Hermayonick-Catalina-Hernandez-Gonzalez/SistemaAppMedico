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
        if(Auth::check()) {
            $servicios = Servicios::all();
            $productos = Producto::all();
            $pacientes = Paciente::all();
            $enfermeros = Enfermero::all();
            $medicos = User::where('role', User::ROL_MEDICO)->get(); // Obtener todos los médicos)

            $pacienteSeleccionado = $request->input('paciente');

            return view('medico.consultas', compact('servicios', 'productos', 'pacientes', 'enfermeros', 'medicos', 'pacienteSeleccionado'));
        }
        
        return redirect()->route('login');
    }


    public function storeConsulta(Request $request)
    {
        $validateData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'motivo_consulta' => 'nullable|string',
            'notas_padecimiento' => 'nullable|string',
            'edad' => 'required|string|max:3',
            'talla' => 'required|string|max:3',
            'temperatura' => 'required|string|max:3',
            'peso' => 'required|string|max:3',
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
        ]);

        Consulta::create($validateData);
        return redirect()->route('consultas')->with('success', 'Consulta creada con éxito');
    }
}
