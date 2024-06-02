<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class platosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platos')->insert([
            'id' => 7,
            'nombre' => 'Pizza tropical',
            'rutaImagen' => '1717361343_pizza.jpg',
            'precio' => 11.95
        ]);

        DB::table('platos')->insert([
            'id' => 8,
            'nombre' => 'Chuletón picante a la parrila',
            'rutaImagen' => '1717361030_fileteParrillaPicante.png',
            'precio' => 17.95
        ]);

        DB::table('platos')->insert([
            'id' => 9,
            'nombre' => 'Rollo de ternera relleno con queso y bacon',
            'rutaImagen' => '1717361113_rolloTerneraQuesoBacon.png',
            'precio' => 11.95
        ]);

        DB::table('platos')->insert([
            'id' => 10,
            'nombre' => 'Corazones de pollo',
            'rutaImagen' => '1717361147_corazonesPollo.png',
            'precio' => 8.95
        ]);

        DB::table('platos')->insert([
            'id' => 11,
            'nombre' => 'Boquerones al limón',
            'rutaImagen' => '1717361174_boqueronesLimon.png',
            'precio' => 11.99
        ]);

        DB::table('platos')->insert([
            'id' => 12,
            'nombre' => 'Patatas deluxe picantes',
            'rutaImagen' => '1717361214_patatasDeluxe.png',
            'precio' => 7.95
        ]);
    }
}
