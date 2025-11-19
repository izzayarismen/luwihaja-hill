<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        if(!$request->nama && !$request->email && !$request->telepon && !$request->password) {
            return back()->with('error', 'Nama lengkap, Email, No. Telepon dan Password tidak boleh kosong!');
        }

        $user = User::where('email', $request->email)->first();

        if($user) {
            return back()->with('error', 'Email sudah terdaftar!');
        }

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat!');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(!$request->email && !$request->password) {
            return back()->with('error', 'Email dan Password tidak boleh kosong!');
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            if($request->user()->role == 'admin') {
                return redirect('/admin')->with('success', 'Berhasil Sign in Admin!');
            } else {
                return redirect('/')->with('success', 'Berhasil Sign in Tutor!');
            }
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    public function getLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout!');
    }
}
