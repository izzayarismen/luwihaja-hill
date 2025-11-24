<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'ulasan',
        'user_id',
        'akomodasi_id'
    ];

    public function akomodasi()
    {
        return $this->belongsTo(Akomodasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
