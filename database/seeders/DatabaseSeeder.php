<?php

namespace Database\Seeders;

use App\Models\Stagiaire;
use App\Models\Appartement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Stagiaire::factory()
        ->has(Appartement::factory()->count(3))
        ->create();
    }
}
