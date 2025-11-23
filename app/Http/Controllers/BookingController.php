<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getBooking($id, Request $request)
    {
        $akomodasi = Akomodasi::findOrFail($id);

        $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->translatedFormat('D, d M Y');
        $tanggal_keluar = Carbon::parse($request->tanggal_keluar)->translatedFormat('D, d M Y');
        $jumlah_malam = Carbon::parse($request->tanggal_masuk)->diffInDays(Carbon::parse($request->tanggal_keluar));

        return view('booking', [
            'akomodasi' => $akomodasi,
            'title' => 'Booking',
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
            'jumlah_malam' => $jumlah_malam,
            'raw_tanggal_masuk' => $request->tanggal_masuk,
            'raw_tanggal_keluar' => $request->tanggal_keluar
        ]);
    }

    public function postBooking($id, Request $request)
    {
        if(!$request->tanggal_masuk && !$request->tanggal_keluar) {
            return back()->with('error', 'Tanggal masuk dan Tanggal keluar tidak boleh kosong!');
        }

        $akomodasi = Akomodasi::findOrFail($id);

        $oder = Order::create([
            'order_id' => 'LWH-'.uniqid(),
            'akomodasi_id' => $akomodasi->id,
            'user_id' => $request->user()->id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'telepon_pemesan' => $request->telepon_pemesan,
            'total_harga' => $request->total_harga,
        ]);

        return redirect('/payment/'.$oder->order_id)->with('success', 'Booking berhasil!');
    }

    public function getPayment($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();

        if(!$order) {
            return abort(404);
        }

        return view('payment', [
            'title' => 'Payment',
            'order' => $order
        ]);
    }

    public function postPayment($order_id, Request $request)
    {
        $order = Order::where('order_id', $order_id)->first();

        if(!$order) {
            return abort(404);
        }

        $filename = 'payment-'.$order_id.'.'.$request->bukti_pembayaran->getClientOriginalExtension();
        $request->bukti_pembayaran->move(public_path('images/payment'), $filename);

        $order->update([
            'bukti_pembayaran' => '/images/payment/'.$filename,
            'status' => 'pending'
        ]);

        return redirect('/profile')->with('success', 'Pembayaran berhasil, Cek menu Pesanan Saya untuk melihat status!');
    }
}
