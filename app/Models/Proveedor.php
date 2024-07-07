<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'biografia',
        'ciudad',
        'user_id',
        'calificacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
