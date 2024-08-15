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

    public function store(Request $request)
    {
        $productos = $request->input('medicacion');
        $cantidades = $request->input('cantidad');

        $updatedProducts = [];
            foreach ($productos as $index => $productoId) {
                $producto = Producto::find($productoId);
                if ($producto) {
                    $cantidad = $cantidades[$index];
                    $producto->cantidad -= $cantidad;
                    $producto->save();
                    $updatedProducts[] = [
                        'id' => $producto->id,
                        'cantidad' => $producto->cantidad,
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'updatedProducts' => $updatedProducts,
            ]);
    }
}
