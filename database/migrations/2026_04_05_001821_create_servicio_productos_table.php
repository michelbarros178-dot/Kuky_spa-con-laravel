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
        Schema::create('servicio_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->unsigned();
            $table->foreignId('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_productos');
    }
};
