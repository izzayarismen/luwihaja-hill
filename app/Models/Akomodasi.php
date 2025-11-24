<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akomodasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'tipe',
        'deskripsi',
        'harga_asli',
        'harga_diskon',
        'checkin',
        'checkout',
        'jumlah_tamu',
        'luas',
        'tipe_kasur',
        'fasilitas',
        'smoking',
        'rekomendasi',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
}
