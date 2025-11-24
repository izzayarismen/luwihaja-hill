<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Faq;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function beranda()
    {
        $akomodasi = Akomodasi::orderBy('id', 'desc')->get();
        $rekomendasi = Akomodasi::where('rekomendasi', True)->orderBy('id', 'desc')->get();
        $faq = Faq::all();

        return view('beranda', [
            'active' => 'beranda',
            'akomodasi' => $akomodasi,
            'rekomendasi' => $rekomendasi,
            'faq' => $faq
        ]);
    }

    public function tentang_kami()
    {
        $akomodasi = Akomodasi::orderBy('id', 'desc')->get();

        return view('tentang-kami', [
            'active' => 'tentang-kami',
            'akomodasi' => $akomodasi
        ]);
    }
}
