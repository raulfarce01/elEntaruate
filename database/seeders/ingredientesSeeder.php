<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ingredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredientes')->insert([
            'id' => 1,
            'nombre' => 'Pimienta'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 2,
            'nombre' => 'Pimentón'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 3,
            'nombre' => 'Salsa picante'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 4,
            'nombre' => 'Filete de ternera'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 5,
            'nombre' => 'Ajo'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 6,
            'nombre' => 'Cebolla'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 7,
            'nombre' => 'Bacon'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 8,
            'nombre' => 'Queso'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 9,
            'nombre' => 'Pimientos verdes'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 10,
            'nombre' => 'Carne picada de ternera'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 11,
            'nombre' => 'Hierbabuena'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 12,
            'nombre' => 'Corazones de pollo'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 13,
            'nombre' => 'Limón'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 14,
            'nombre' => 'Boquerones'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 15,
            'nombre' => 'Patatas'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 16,
            'nombre' => 'Pimentón dulce'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 17,
            'nombre' => 'Tomate cherry'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 18,
            'nombre' => 'Aceitunas negras'
        ]);

        DB::table('ingredientes')->insert([
            'id' => 19,
            'nombre' => 'Salsa de tomate'
        ]);

    }
}
