<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use App\Models\Servicio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // crear usuario proveedor
        $proveedor = User::create([
            'name' => 'proveedor',
            'email' => 'proveedor@gmail.com',
            'password' => Hash::make('password'),
            'rol' => 'proveedor'
        ]);

        if ($proveedor) { // Si el usuario se creo correctamente
            Proveedor::create([
                'user_id' => $proveedor->id
            ]);
        }

        // crear usuario cliente
        User::create([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('password'),
            'rol' => 'cliente'
        ]);

        // crear 10 usuarios provedores de prueba
        User::factory(10)->create();
        // crear 15 proveedores de prueba
        Proveedor::factory(15)->create();
        // crear 30 servicios de prueba
        Servicio::factory(50)->create();
    }
}
