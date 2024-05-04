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
        Schema::create('cupon_platos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuponId');
            $table->unsignedBigInteger('platoId');
            $table->timestamps();

            $table->foreign('cuponId')
                ->references('id')->on('cupones')
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
        Schema::dropIfExists('cupon_platos');
    }
};
