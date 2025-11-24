<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'akomodasi_id',
        'user_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'nama_pemesan',
        'email_pemesan',
        'telepon_pemesan',
        'total_harga',
        'bukti_pembayaran',
        'status',
    ];

    public function akomodasi()
    {
        return $this->belongsTo(Akomodasi::class, 'akomodasi_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
