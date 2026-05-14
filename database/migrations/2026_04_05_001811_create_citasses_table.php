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
        Schema::create('citasses', function (Blueprint $table) {
            $table->id();
            $table->date('fecha'); // La fecha de la cita
            $table->time('hora');  // La hora (que te faltaba)
            $table->string('nombre'); // Nombre del dueño/mascota
            $table->string('servicio'); // El servicio del spa
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('notas')->nullable();
            $table->string('estado')->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citasses');
    }
};