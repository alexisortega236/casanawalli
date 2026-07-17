<?php

namespace Database\Factories;

use App\Models\AvailabilityRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AvailabilityRequest>
 */
class AvailabilityRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'arrival_date' => now()->addWeek(),
            'departure_date' => now()->addWeek()->addDays(3),
            'guests' => 2,
            'message' => fake()->sentence(),
            'locale' => 'en',
            'status' => 'new',
        ];
    }
}
