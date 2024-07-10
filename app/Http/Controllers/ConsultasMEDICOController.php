<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Producto;

class ConsultasMEDICOController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all(); // Obtener todos los servicios
        $productos = Producto::all(); // Obtener todos los medicamentos

        return view('medico.consultas', compact('servicios', 'productos'));
    }
}
