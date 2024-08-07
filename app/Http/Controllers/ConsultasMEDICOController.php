<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Enfermero;
use App\Models\Paciente;
use App\Models\Producto;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ConsultasMEDICOController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        $productos = Producto::all();
        $pacientes = Paciente::all();
        $enfermeros = Enfermero::all();
        return view('medico.consultas', compact('servicios', 'productos', 'pacientes', 'enfermeros'));
    }

    /*
    public function storeConsulta()
    {
        $data = request()->validate([
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'motivo_consulta' => 'required',
            'notas_padecimiento' => 'nullable',
            'edad' => 'nullable',
            'talla' => 'nullable',
            'temperatura' => 'nullable',
            'peso' => 'nullable',
            'frecuencia_cardiaca' => 'nullable',
            'alergias' => 'nullable',
            'diagnostico' => 'nullable',
            'solicitar_estudios' => 'nullable',
            'indicaciones_estudios' => 'nullable',
            'medicacion' => 'nullable',
            'cantidad' => 'nullable',
            'frecuencia' => 'nullable',
            'duracion' => 'nullable',
            'notas_receta' => 'nullable',
        ]);

        Consulta::create($data);

        return redirect()->route('consultas');
    }*/
}
