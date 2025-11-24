<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
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

    public function verifikasi()
    {
        $orders = Order::with(['akomodasi', 'user'])
            ->where('status', 'pending')
            ->get()
            ->map(function ($item) {

                return [
                    'id' => $item->id,
                    'order_id' => $item->order_id,
                    'user' => $item->user,
                    'akomodasi' => $item->akomodasi,
                    'nama_pemesan' => $item->nama_pemesan,
                    'email_pemesan' => $item->email_pemesan,
                    'telepon_pemesan' => $item->telepon_pemesan,
                    'tanggal_masuk' => Carbon::parse($item->tanggal_masuk)->format('d M Y'),
                    'tanggal_keluar' => Carbon::parse($item->tanggal_keluar)->format('d M Y'),
                    'created_at' => Carbon::parse($item->created_at)->format('d M Y'),
                    'tglBooking' => Carbon::parse($item->created_at)->format('Y-m-d'),

                    'total_harga' => 'Rp ' . number_format($item->total_harga, 0, ',', '.'),

                    'bukti_pembayaran' => $item->bukti_pembayaran,
                    'akomodasi_id' => $item->akomodasi_id,
                ];
            });

        return view('admin.verifikasi', [
            'title' => 'Verifikasi',
            'orders' => $orders,
        ]);
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:verified,rejected'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Berhasil verifikasi booking!');
    }

}
