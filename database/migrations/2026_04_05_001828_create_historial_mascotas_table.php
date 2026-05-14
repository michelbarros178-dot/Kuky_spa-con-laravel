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
        Schema::create('historial_mascotas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->notNull();
            $table->dateTime('fecha_registro')->datetime();
            $table->foreignId('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreignId('id_cita')->references('id')->on('citasses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_mascotas');
    }
};
