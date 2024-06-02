<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surnames' => 'admin',
            'telefono' => '123456789',
            'email' => 'admin@admin.es',
            'current_team_id' => 1,
            'password' => '$2y$12$32PrTcuieTJ86a/zlSV3VenPISVm7lSf9s2cvIo4EaOmdeZFF1oKG',
        ]);

        DB::table('users')->insert([
            'name' => 'Anónimo',
            'surnames' => 'Anónimo',
            'telefono' => '000000001',
            'email' => 'anonimo@anonimo.es',
            'password' => '$2y$12$QjcWXtCj8OmXcgTQcaq1t.JcNF4C5y9ZFXbJ65vSt2f3N.XBHmh8C',
        ]);
    }
}
