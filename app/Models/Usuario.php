<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    protected $fillable = ['nombre', 'correo', 'contraseña'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}