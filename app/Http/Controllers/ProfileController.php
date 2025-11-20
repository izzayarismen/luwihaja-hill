<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $pesanan_saya = Order::where('user_id', Auth::user()->id)->with('akomodasi')->get();

        return view('profile', [
            'title' => 'Profil',
            'pesanan_saya' => $pesanan_saya
        ]);
    }

    public function updateProfile(Request $request)
    {
        if(!$request->nama && !$request->email && !$request->telepon) {
            return back()->with('error', 'Nama lengkap, Email, dan No. Telepon tidak boleh kosong!');
        }

        $user = User::where('email', $request->user()->email)->first();

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        if(!$request->password) {
            return back()->with('error', 'Password tidak boleh kosong!');
        }

        $user = User::where('email', $request->user()->email)->first();

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
