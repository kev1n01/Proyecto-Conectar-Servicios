<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public $categorias = [
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

    /**
     * Mostrar toda los servicios.
     */
    public function index(Request $request)
    {
        $categorias = $this->categorias;
        $ciudadesRegistradas = Proveedor::pluck('ciudad')->unique();
    
        $query = Servicio::query();
    
        if ($request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('ciudad')) {
            $query->whereHas('proveedor', function ($q) use ($request) {
                $q->where('ciudad', $request->ciudad);
            });
        }
    
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
    
        $servicios = $query->get();
    
        return view('cliente.index', compact('servicios', 'ciudadesRegistradas', 'categorias'));
    }

    /**
     * Mostrar el formulario para crear un nuevo servicio.
     */
    public function create()
    {
        $categorias = $this->categorias;
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
}
