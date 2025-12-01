<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odpowiedz extends Model
{
    use HasFactory;

    protected $table = 'odpowiedzi';

    protected $fillable = ['pytanie_id', 'odpowiedz', 'czy_poprawna'];

    public function pytanie()
    {
        return $this->belongsTo(Pytanie::class, 'pytanie_id');
    }
}
