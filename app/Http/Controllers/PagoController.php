<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Mostrar una lista de pagos.
     */
    public function index()
    {
        $pagos = Pago::with(['usuario', 'reserva'])->get();
        return response()->json(['pagos' => $pagos], 200);
    }

    /**
     * Guardar un nuevo pago.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric',
            'fecha' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id',
            'reserva_id' => 'required|exists:reservas,id',
        ]);

        $pago = Pago::create([
            'total' => $request->total,
            'fecha' => $request->fecha,
            'usuario_id' => $request->usuario_id,
            'reserva_id' => $request->reserva_id,
        ]);

        return response()->json(['pago' => $pago], 201);
    }

    /**
     * Mostrar un pago específico.
     */
    public function show($id)
    {
        $pago = Pago::with(['usuario', 'reserva'])->findOrFail($id);
        return response()->json(['pago' => $pago], 200);
    }

    /**
     * Actualizar un pago específico.
     */
    public function update(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);

        $request->validate([
            'total' => 'sometimes|required|numeric',
            'fecha' => 'sometimes|required|date',
            'usuario_id' => 'sometimes|required|exists:usuarios,id',
            'reserva_id' => 'sometimes|required|exists:reservas,id',
        ]);

        $pago->total = $request->get('total', $pago->total);
        $pago->fecha = $request->get('fecha', $pago->fecha);
        $pago->usuario_id = $request->get('usuario_id', $pago->usuario_id);
        $pago->reserva_id = $request->get('reserva_id', $pago->reserva_id);
        $pago->save();

        return response()->json(['pago' => $pago], 200);
    }

    /**
     * Eliminar un pago específico.
     */
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return response()->json(['message' => 'Pago eliminado exitosamente'], 200);
    }
}
