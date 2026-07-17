<?php

namespace Database\Factories;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Amenity>
 */
class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_es' => fake()->words(2, true),
            'name_en' => fake()->words(2, true),
            'icon' => null,
            'category' => 'general',
            'is_active' => true,
        ];
    }
}
