<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermero;
use App\Models\Servicios;
use App\Models\Consulta;
use App\Models\Producto;
use App\Models\Paciente;

class ConsultasMEDICOController extends Controller
{
    public function index(Request $request)
    {
        $servicios = Servicios::all(); // Obtener todos los servicios
        $productos = Producto::all(); // Obtener todos los medicamentos
        $enfermeros = Enfermero::all(); // Obtener todos los enfermeros
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $paciente = $request->input('paciente');

        return view('medico.consultas', compact('servicios', 'productos', 'enfermeros', 'pacientes', 'paciente'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'paciente' => 'required|exists:pacientes,id',
            'motivo_consulta' => 'nullable|string',
            'notas_padecimiento' => 'nullable|string',
            'edad' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
            'temperatura' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'frecuencia_cardiaca' => 'nullable|numeric',
            'alergias' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'solicitar_estudios.*' => 'nullable|exists:servicios,id',
            'indicaciones_estudios.*' => 'nullable|string',
            'medicacion.*' => 'nullable|exists:productos,id',
            'cantidad.*' => 'nullable|numeric',
            'frecuencia.*' => 'nullable|string',
            'duracion.*' => 'nullable|string',
            'notas_receta' => 'nullable|string',
            'enfermero_participacion' => 'nullable|boolean',
            'enfermero_id' => 'nullable|exists:enfermeros,id',
        ]);
        // Crear la consulta
        $consulta = Consulta::create([
            'paciente_id' => $request->input('paciente'),
            'motivo_consulta' => $request->input('motivo_consulta'),
            'notas_padecimiento' => $request->input('notas_padecimiento'),
            'edad' => $request->input('edad'),
            'talla' => $request->input('talla'),
            'temperatura' => $request->input('temperatura'),
            'peso' => $request->input('peso'),
            'frecuencia_cardiaca' => $request->input('frecuencia_cardiaca'),
            'alergias' => $request->input('alergias'),
            'diagnostico' => $request->input('diagnostico'),
            'notas_receta' => $request->input('notas_receta'),
            'enfermero_id' => $request->input('enfermero_id'),
        ]);

        // Asociar estudios
        if ($request->has('solicitar_estudios')) {
            foreach ($request->input('solicitar_estudios') as $index => $estudioId) {
                $consulta->estudios()->create([
                    'servicio_id' => $estudioId,
                    'indicaciones' => $request->input('indicaciones_estudios')[$index] ?? '',
                ]);
            }
        }

        // Asociar medicamentos
        if ($request->has('medicacion')) {
            foreach ($request->input('medicacion') as $index => $medicamentoId) {
                $consulta->medicamentos()->create([
                    'producto_id' => $medicamentoId,
                    'cantidad' => $request->input('cantidad')[$index] ?? 0,
                    'frecuencia' => $request->input('frecuencia')[$index] ?? '',
                    'duracion' => $request->input('duracion')[$index] ?? '',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Consulta registrada exitosamente.');
    }
}
