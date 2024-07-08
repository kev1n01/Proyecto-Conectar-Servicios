<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria', 'proveedor_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');

    }

}
