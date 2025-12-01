<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class PytanieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory(), // automatycznie tworzy quiz, jeśli go nie ma
            'tresc' => $this->faker->sentence() . '?',
        ];
    }
}
