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
        Schema::create('confirmacion_citas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_confirmacion')->datetime();
            $table->foreignId('id_cita')->references('id')->on('citasses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmacion_citas');
    }
};
