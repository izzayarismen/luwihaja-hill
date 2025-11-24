<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ulasan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $pesanan_saya = Order::where('user_id', Auth::user()->id)->with('akomodasi')->orderBy('id', 'desc')->get();

        Order::where(function ($q) {
            $q->where('status', 'unpayed')
              ->orWhere('status', 'rejected');
        })
        ->where('updated_at', '<', Carbon::now()->subHours(24))
        ->delete();

        $ulasan_saya = Ulasan::where('user_id', Auth::user()->id)->get();

        return view('profile', [
            'title' => 'Profil',
            'pesanan_saya' => $pesanan_saya,
            'ulasan_saya' => $ulasan_saya
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric'
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'Password saat ini salah!');
        }

        if ($request->password != $request->confirm_password) {
            return back()->with('error', 'Password konfirmasi tidak cocok!');
        }

        $user = User::where('id', Auth::user()->id)->first();

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    public function postUlasan(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'ulasan' => 'required',
            'akomodasi_id' => 'required'
        ]);

        Ulasan::UpdateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'akomodasi_id' => $request->akomodasi_id
            ],
            [
                'rating' => $request->rating,
                'ulasan' => $request->ulasan,
            ]
        );

        return back()->with('success', 'Berhasil memberi ulasan!');
    }

    public function deleteUlasan($id)
    {
        Ulasan::findOrFail($id)->delete();
        return back()->with('success', 'Ulasan berhasil dihapus!');
    }
}
