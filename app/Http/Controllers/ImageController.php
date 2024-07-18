<?php
namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function show($id)
    {
        $servicio = Servicios::findOrFail($id);
        if ($servicio->content) {
            return new Response($servicio->content, 200, [
                'Content-Type' => 'image/jpeg', // Cambia el tipo de contenido según el formato de tus imágenes
                'Content-Disposition' => 'inline; filename="image.jpg"'
            ]);
        } else {
            return response()->file(public_path('images/Logo.png')); // Ruta a una imagen predeterminada
        }
    }
}
