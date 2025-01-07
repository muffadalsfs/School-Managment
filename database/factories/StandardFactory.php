<?php

namespace Database\Factories;

use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\Factory;

class StandardFactory extends Factory
{
    protected $model = Standard::class; // Explicitly set the model

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'class_number' => $this->faker->numberBetween(1, 10),
        ];
    }
}
