<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class platoIngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plato_ingredientes')->insert([
            'id' => 37,
            'platoId' => 8,
            'ingredienteId' => 1,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 38,
            'platoId' => 8,
            'ingredienteId' => 2,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 39,
            'platoId' => 8,
            'ingredienteId' => 4,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 40,
            'platoId' => 8,
            'ingredienteId' => 9,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 41,
            'platoId' => 8,
            'ingredienteId' => 5,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 42,
            'platoId' => 8,
            'ingredienteId' => 3,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 43,
            'platoId' => 9,
            'ingredienteId' => 9,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 44,
            'platoId' => 9,
            'ingredienteId' => 8,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 45,
            'platoId' => 9,
            'ingredienteId' => 7,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 46,
            'platoId' => 9,
            'ingredienteId' => 11,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 47,
            'platoId' => 9,
            'ingredienteId' => 10,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 48,
            'platoId' => 10,
            'ingredienteId' => 16,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 49,
            'platoId' => 10,
            'ingredienteId' => 11,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 50,
            'platoId' => 10,
            'ingredienteId' => 1,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 51,
            'platoId' => 10,
            'ingredienteId' => 2,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 52,
            'platoId' => 10,
            'ingredienteId' => 12,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 53,
            'platoId' => 11,
            'ingredienteId' => 13,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 54,
            'platoId' => 11,
            'ingredienteId' => 14,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 55,
            'platoId' => 12,
            'ingredienteId' => 6,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 56,
            'platoId' => 12,
            'ingredienteId' => 5,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 57,
            'platoId' => 12,
            'ingredienteId' => 16,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 58,
            'platoId' => 12,
            'ingredienteId' => 2,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 59,
            'platoId' => 12,
            'ingredienteId' => 1,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 60,
            'platoId' => 12,
            'ingredienteId' => 15,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 67,
            'platoId' => 7,
            'ingredienteId' => 19,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 68,
            'platoId' => 7,
            'ingredienteId' => 17,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 69,
            'platoId' => 7,
            'ingredienteId' => 18,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 70,
            'platoId' => 7,
            'ingredienteId' => 9,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 71,
            'platoId' => 7,
            'ingredienteId' => 8,
        ]);

        DB::table('plato_ingredientes')->insert([
            'id' => 72,
            'platoId' => 7,
            'ingredienteId' => 6,
        ]);
    }
}
