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
        Schema::create('usuario_reservas', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('platoId');
            $table->timestamps();

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('platoId')
                ->references('id')->on('platos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_reservas');
    }
};