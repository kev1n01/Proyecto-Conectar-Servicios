<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Mostrar una lista de servicios.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return response()->json(['servicios' => $servicios], 200);
    }

    /**
     * Guardar un nuevo servicio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        $servicio = Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        return response()->json(['servicio' => $servicio], 201);
    }

    /**
     * Mostrar un servicio específico.
     */
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return response()->json(['servicio' => $servicio], 200);
    }

    /**
     * Actualizar un servicio específico.
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric',
        ]);

        $servicio->nombre = $request->get('nombre', $servicio->nombre);
        $servicio->descripcion = $request->get('descripcion', $servicio->descripcion);
        $servicio->precio = $request->get('precio', $servicio->precio);
        $servicio->save();

        return response()->json(['servicio' => $servicio], 200);
    }

    /**
     * Eliminar un servicio específico.
     */
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return response()->json(['message' => 'Servicio eliminado exitosamente'], 200);
    }
}
