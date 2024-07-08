<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('estado'); // Valores posibles: 'en progreso', 'completada', 'cancelada'
            $table->foreignId('user_id')->constrained('users'); // id del usuario 
            $table->foreignId('servicio_id')->constrained('servicios'); //id del servicio reservado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
