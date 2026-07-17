<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
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
            'name_es' => fake()->words(3, true),
            'name_en' => fake()->words(3, true),
            'subtitle_es' => fake()->sentence(3),
            'subtitle_en' => fake()->sentence(3),
            'description_es' => fake()->paragraphs(2, true),
            'description_en' => fake()->paragraphs(2, true),
            'capacity' => 2,
            'bed_type' => 'Queen size bed',
            'room_type' => 'Garden room',
            'location_description' => 'Garden area',
            'featured_image' => 'https://images.unsplash.com/photo-1560185007-c5ca9d2c014d?auto=format&fit=crop&w=1200&q=80',
            'is_featured' => fake()->boolean(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 50),
        ];
    }
}
