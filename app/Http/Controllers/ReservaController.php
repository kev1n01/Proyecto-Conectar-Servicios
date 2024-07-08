<?php

namespace App\Http\Controllers;

use App\Models\Reserva;

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
}
