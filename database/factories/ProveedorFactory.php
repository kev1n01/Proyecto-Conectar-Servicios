<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 11),
            'biografia' => $this->faker->paragraph,
            'calificacion' => $this->faker->randomFloat(1, 1, 10),
            'ciudad' => $this->faker->city,
        ];
    }
}
