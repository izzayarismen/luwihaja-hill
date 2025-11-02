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
}
