<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $harga = $request->input('harga');
        $kapasitas = $request->input('kapasitas');
        $sort = $request->input('sort', 'default');
        $priceColumnRaw = 'COALESCE(harga_diskon, harga_asli)';

        $query = Akomodasi::query();

        $query->when($harga, function ($q) use ($harga, $priceColumnRaw) {
            if ($harga == '0-500') {
                return $q->whereRaw("$priceColumnRaw <= 500000");
            }
            if ($harga == '500-1000') {
                return $q->whereRaw("$priceColumnRaw BETWEEN 500000 AND 1000000");
            }
            if ($harga == '1000+') {
                return $q->whereRaw("$priceColumnRaw >= 1000000");
            }
        });

        $query->when($kapasitas, function ($q) use ($kapasitas) {
            if ($kapasitas == '1-2') {
                return $q->whereBetween('jumlah_tamu', [1, 2]);
            }
            if ($kapasitas == '3-4') {
                return $q->whereBetween('jumlah_tamu', [3, 4]);
            }
            if ($kapasitas == '5+') {
                return $q->where('jumlah_tamu', '>=', 5);
            }
        });

        if ($sort == 'price-low') {
            $query->orderByRaw($priceColumnRaw . ' ASC');
        } elseif ($sort == 'price-high') {
            $query->orderByRaw($priceColumnRaw . ' DESC');
        } else {
            $query->orderBy('id', 'desc');
        }

        $akomodasi = $query->get();
        return view('akomodasi', [
            'active' => 'akomodasi',
            'akomodasi' => $akomodasi,
            'harga' => $harga,
            'kapasitas' => $kapasitas,
            'sort' => $sort
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $akomodasi = Akomodasi::find($id);

        return view('detail-akomodasi', [
            'active' => 'akomodasi',
            'akomodasi' => $akomodasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
