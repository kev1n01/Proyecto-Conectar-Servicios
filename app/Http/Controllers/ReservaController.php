<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Mostrar una lista de reservas.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('proveedor.index', compact('reservas'));
    }

    /**
     * Guardar una nueva reserva.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'usuario_id' => 'required|exists:usuarios,id',
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);

        $reserva = Reserva::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'usuario_id' => $request->usuario_id,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return response()->json(['reserva' => $reserva], 201);
    }

    /**
     * Mostrar una reserva específica.
     */
    public function show($id)
    {
        $reserva = Reserva::with(['usuario', 'proveedor'])->findOrFail($id);
        return response()->json(['reserva' => $reserva], 200);
    }

    /**
     * Actualizar una reserva específica.
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $request->validate([
            'fecha' => 'sometimes|required|date',
            'hora' => 'sometimes|required|date_format:H:i',
            'usuario_id' => 'sometimes|required|exists:usuarios,id',
            'proveedor_id' => 'sometimes|required|exists:proveedors,id',
        ]);

        $reserva->fecha = $request->get('fecha', $reserva->fecha);
        $reserva->hora = $request->get('hora', $reserva->hora);
        $reserva->usuario_id = $request->get('usuario_id', $reserva->usuario_id);
        $reserva->proveedor_id = $request->get('proveedor_id', $reserva->proveedor_id);
        $reserva->save();

        return response()->json(['reserva' => $reserva], 200);
    }

    /**
     * Eliminar una reserva específica.
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(['message' => 'Reserva eliminada exitosamente'], 200);
    }
}
