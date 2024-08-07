<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Exception;

class VentaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'medicacion.*' => 'required|exists:productos,id',
                'cantidad.*' => 'required|integer|min:1',
            ]);

            $medicaciones = $validatedData['medicacion'];
            $cantidades = $validatedData['cantidad'];

            $updatedProducts = [];

            foreach ($medicaciones as $index => $medicacionId) {
                $cantidad = $cantidades[$index];
                $producto = Producto::find($medicacionId);

                if ($producto->cantidad >= $cantidad) {
                    $producto->cantidad -= $cantidad;
                    $producto->save();

                    $updatedProducts[] = $producto;
                } else {
                    return response()->json(['error' => 'No hay suficiente stock para el producto: ' . $producto->nombre], 400);
                }
            }

            return response()->json(['success' => 'Venta realizada con éxito.', 'updatedProducts' => $updatedProducts]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
}
