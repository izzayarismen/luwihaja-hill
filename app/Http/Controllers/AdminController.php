<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_akun = User::where('role', 'customer')->get()->count();
        $total_kamar = Akomodasi::all()->count();
        $total_booking = Order::all()->count();
        $belum_verifikasi = Order::where('status', 'pending')->count();

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'total_akun' => $total_akun,
            'total_kamar' => $total_kamar,
            'total_booking' => $total_booking,
            'belum_verifikasi' => $belum_verifikasi
        ]);
    }
}
