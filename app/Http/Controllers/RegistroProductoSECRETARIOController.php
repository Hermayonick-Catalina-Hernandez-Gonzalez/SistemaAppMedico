<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 

class RegistroProductoSECRETARIOController extends Controller
{
    public function index()
    {
        return view('secretario.registro-productos');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'fecha_vencimiento' => 'required|date',
            'precio' => 'required|numeric',
        ]);

        Producto::create($validated);

        return redirect()->back()->with('success', 'Producto registrado correctamente.');
    }
}
