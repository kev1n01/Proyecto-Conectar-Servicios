<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['fecha', 'hora', 'usuario_id', 'proveedor_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
