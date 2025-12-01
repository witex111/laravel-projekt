<?php

namespace Database\Factories;

use App\Models\Pytanie;
use Illuminate\Database\Eloquent\Factories\Factory;

class OdpowiedzFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pytanie_id' => Pytanie::factory(),
            'odpowiedz' => $this->faker->word(),
            'czy_poprawna' => $this->faker->boolean(25), // 25% szans na poprawną
        ];
    }
}
