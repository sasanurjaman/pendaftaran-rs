<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(2,6),
            'patient_name' => fake()->name(),
            'patient_gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'patient_brithday' => fake()->dateTimeBetween('1990-01-01', '2010-01-01')->format('Y-m-d'),
            'patient_born' => fake()->city(),
            'patient_age' => fake()->randomNumber(2),
            'patient_address' => fake()->address(),
            'patient_status' => fake()->randomElement(['Menikah', 'Belum Menikah']),
            'patient_image' => 'https://source.unsplash.com/400x400/?people',
            'patient_is_bpjs' => fake()->randomElement([1,0]),
            'patient_file' => 'https://source.unsplash.com/400x400/?random'
        ];
    }
}
