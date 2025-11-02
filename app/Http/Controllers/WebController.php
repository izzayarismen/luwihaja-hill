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
        $faq = Faq::all();

        return view('beranda', [
            'active' => 'beranda',
            'akomodasi' => $akomodasi,
            'faq' => $faq
        ]);
    }

    public function tentang_kami()
    {
        return view('tentang-kami', [
            'active' => 'tentang-kami'
        ]);
    }
}
