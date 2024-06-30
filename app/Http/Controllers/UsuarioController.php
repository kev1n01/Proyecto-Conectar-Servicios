<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'contraseña' => 'required|string|min:8|confirmed',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña),
        ]);

        return response()->json(['usuario' => $usuario], 201);
    }

    /**
     * Iniciar sesión de un usuario.
     */
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'contraseña' => 'required|string',
        ]);

        if (!Auth::attempt(['correo' => $request->correo, 'password' => $request->contraseña])) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        $usuario = Auth::user();

        return response()->json(['usuario' => $usuario], 200);
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json(['usuario' => $usuario], 200);
    }

    /**
     * Actualizar un usuario específico.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|string|email|max:255|unique:usuarios,correo,' . $usuario->id,
            'contraseña' => 'sometimes|required|string|min:8|confirmed',
        ]);

        $usuario->nombre = $request->get('nombre', $usuario->nombre);
        $usuario->correo = $request->get('correo', $usuario->correo);
        if ($request->has('contraseña')) {
            $usuario->contraseña = Hash::make($request->contraseña);
        }
        $usuario->save();

        return response()->json(['usuario' => $usuario], 200);
    }

    /**
     * Eliminar un usuario específico.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado exitosamente'], 200);
    }
}
