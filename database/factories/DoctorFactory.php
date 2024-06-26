<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()
                ->unique()
                ->numberBetween(6, 10),
            'doctor_name' => fake()->name(),
            'doctor_gender' => fake()->randomElement([
                'Laki-laki',
                'Perempuan',
            ]),
            'doctor_brithday' => fake()
                ->dateTimeBetween('1990-01-01', '2012-01-01')
                ->format('Y-m-d'),
            'doctor_address' => fake()->address(),
            'doctor_specialization' => fake()->word(),
        ];
    }
}
