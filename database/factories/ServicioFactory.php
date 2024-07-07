<?php

namespace Database\Factories;

use App\Models\Servicio;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'categoria' => $this->faker->randomElement([
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
            ]),
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomFloat(2, 10, 3000),
            'proveedor_id' => rand(1, 15), // Suponiendo que tienes un factory para proveedores
        ];
    }
}
