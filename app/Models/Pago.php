<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['total', 'fecha', 'usuario_id', 'reserva_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
