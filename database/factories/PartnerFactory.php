<?php

namespace Database\Factories;

use App\Models\CvConsultant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $position = ['Ketua', 'Sekertaris', 'Supervisor'];
        $cvConsultant = CvConsultant::pluck('id')->all();

        return [
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'cv_consultant_id' => $cvConsultant[array_rand($cvConsultant)],
            'position' => $position[array_rand($position)],
        ];
    }
}
