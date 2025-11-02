<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function beranda()
    {
        $akomodasi = Akomodasi::all();

        return view('beranda', [
            'active' => 'beranda',
            'akomodasi' => $akomodasi
        ]);
    }

    public function tentang_kami()
    {
        return view('tentang-kami', [
            'active' => 'tentang-kami'
        ]);
    }
}
