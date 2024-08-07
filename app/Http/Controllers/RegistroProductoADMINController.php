<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class RegistroProductoADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-productos');
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
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->fecha_vencimiento = $request->input('fecha_vencimiento');
        $producto->precio = $request->input('precio');
        $producto->save();

        return redirect()->route('admin.dashboard')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $servicio = Producto::findOrFail($id);
        $servicio->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Producto eliminado con éxito.');
    }
}
