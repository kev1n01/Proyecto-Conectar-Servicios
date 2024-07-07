<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Mostrar toda los servicios.
     */
    public function index()
    {
        $servicios = Servicio::all();
        $ciudadesRegistradas = Proveedor::pluck('ciudad');
        return view('cliente.index', compact('servicios', 'ciudadesRegistradas'));
    }

    /**
     * Mostrar el formulario para crear un nuevo servicio.
     */
    public function create()
    {

        $categorias = [
            'Limpieza del Hogar',
            'Plomería',
            'Electricidad',
            'Jardinería',
            'Pintura',
            'Mudanzas',
            'Reparación de Electrodomésticos',
            'Belleza y Spa',
            'Entrenamiento Personal',
            'Cuidado de Mascotas',
            'Cerrajería',
            'Albañilería',
            'Carpintería',
            'Tecnología',
            'Asesoría Legal'
        ];

        return view('proveedor.crear-servicio', compact('categorias'));
    }

    /**
     * Guardar un nuevo servicio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        Servicio::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'proveedor_id' => auth()->user()->id,
        ]);

        return redirect(route('crear-servicio'))
            ->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Mostrar un servicio específico.
     */
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('cliente.ver', compact('servicio'));
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
