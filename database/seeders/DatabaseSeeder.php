<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(teamsSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(platosSeeder::class);
        $this->call(ingredientesSeeder::class);
        $this->call(platoIngredientesSeeder::class);
    }
}
