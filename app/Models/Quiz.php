<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizy';

    protected $fillable = ['tytul', 'opis'];

    public function pytania()
    {
        return $this->hasMany(Pytanie::class, 'quiz_id');
    }
}
