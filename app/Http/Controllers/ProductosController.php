<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('secretario.medicamentos', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return response()->json([
            'cantidad' => $producto ? $producto->cantidad : 0,
        ]);
    }
}
