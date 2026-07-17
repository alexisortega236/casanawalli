<?php

namespace Database\Seeders;

use Database\Seeders\Demo\CasaNawalliDemoSeeder;
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
            'name' => 'Casa Nawalli Admin',
            'email' => 'admin@example.com',
        ]);

        $this->call(CasaNawalliDemoSeeder::class);
    }
}
