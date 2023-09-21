<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $existingUnitNames = Unit::pluck('unit')->toArray(); // Ambil semua nama satuan yang sudah ada dalam database
        $unit = ['kg', 'ls', 'cm', 'm', 'pcs', 'botol', 'lbr', 'buah'];

        $availableUnit = Arr::except($unit, $existingUnitNames);

        if (empty($availableUnit)) {
            // Jika semua satuan sudah digunakan, kembalikan salah satu yang sudah ada
            $randomUnit = Arr::random($existingUnitNames);
        } else {
            // Jika masih ada satuan yang tersedia, ambil satuan secara acak dari yang tersedia
            $randomUnit = Arr::random($availableUnit);
        }

        return [
            'unit' => $randomUnit
        ];
    }
}
