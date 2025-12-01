<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Pytanie;
use App\Models\Odpowiedz;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::factory()
            ->count(3)
            ->has(
                Pytanie::factory()
                    ->count(5)
                    ->has(
                        Odpowiedz::factory()->count(4),
                        'odpowiedzi'       
                    ),
                'pytania' 
            )
            ->create();
    }
}
