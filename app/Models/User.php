<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function pagos()
    {
        
        return $this->hasMany(Pago::class);
    }
}