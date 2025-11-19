<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Faq;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function beranda()
    {
        $akomodasi = Akomodasi::all();
        $rekomendasi = Akomodasi::where('rekomendasi', True)->get();
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
        $akomodasi = Akomodasi::all();

        return view('tentang-kami', [
            'active' => 'tentang-kami',
            'akomodasi' => $akomodasi
        ]);
    }
}
