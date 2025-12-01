<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pytanie extends Model
{
    use HasFactory;

    protected $table = 'pytania';

    protected $fillable = ['quiz_id', 'tresc'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function odpowiedzi()
    {
        return $this->hasMany(Odpowiedz::class, 'pytanie_id');
    }
}
