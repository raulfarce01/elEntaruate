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
        Schema::create('plato_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platoId');
            $table->unsignedBigInteger('pedidoId');
            $table->timestamps();

            $table->foreign('platoId')
                ->references('id')->on('platos')
                ->onDelete('cascade');

            $table->foreign('pedidoId')
                ->references('id')->on('pedidos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plato_pedidos');
    }
};
