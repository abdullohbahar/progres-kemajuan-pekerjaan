<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActingCommitmentMarker>
 */
class ActingCommitmentMarkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $position = ['Ketua', 'Sekertaris', 'Supervisor'];

        return [
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'nip' => fake()->numberBetween(0, 20_000),
            'position' => $position[array_rand($position)],
        ];
    }
}
