<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tytul' => $this->faker->sentence(3),
            'opis' => $this->faker->paragraph(),
        ];
    }
}
