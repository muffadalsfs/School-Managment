<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stundents>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => $this->faker->name(),
            'student_id' => $this->faker->randomDigit(),
            'country' => $this->faker->country(),
            'address' => $this->faker->streetAddress(),
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
