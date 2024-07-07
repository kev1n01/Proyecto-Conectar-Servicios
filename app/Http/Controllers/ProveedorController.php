<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function edit($id)
    {
        $ciudadesPeru = [
            'Lima',
            'Arequipa',
            'Trujillo',
            'Chiclayo',
            'Piura',
            'Iquitos',
            'Cusco',
            'Huancayo',
            'Tacna',
            'Pucallpa',
            'Juliaca',
            'Sullana',
            'Chimbote',
            'Ica',
            'Ayacucho',
            'Cajamarca',
            'Puno',
            'Huaraz',
            'Tumbes',
            'Moquegua',
            'Tarapoto',
            'Puerto Maldonado',
            'Pisco',
            'Talara',
            'Huaral',
            'Barranca',
            'Huacho',
            'Tarma',
            'Chachapoyas',
            'Moyobamba',
            'Bagua',
            'Cerro de Pasco',
            'Abancay',
            'Yurimaguas',
            'Jaén',
            'Chincha Alta',
            'Chepén',
            'Nazca',
            'Huaral',
            'Casma',
            'Tocache',
            'Huancavelica',
            'San Ramón',
            'Huamanga',
            'La Oroya',
            'Huanta',
            'Satipo',
            'Sechura',
            'Lambayeque'
        ];

        $proveedor = Proveedor::where('user_id', $id)->first();
        return view('proveedor.actualizar-info', compact('proveedor', 'ciudadesPeru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'biografia' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'ciudad' => 'required|string|max:255',
        ]);
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->user->name = $request->nombre;
        $proveedor->user->email = $request->correo;
        $proveedor->user->save();
        $proveedor->biografia = $request->biografia;
        $proveedor->ciudad = $request->ciudad;
        $proveedor->save();
        return redirect(route('mi-informacion', $id))
        ->with('success', 'Proveedor actualizado correctamente.');;
    }
}
