<?php

namespace Database\Factories;

use App\Models\RoomCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoomCategory>
 */
class RoomCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'name_es' => fake()->words(2, true),
            'name_en' => fake()->words(2, true),
            'description_es' => fake()->paragraph(),
            'description_en' => fake()->paragraph(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 50),
        ];
    }
}
