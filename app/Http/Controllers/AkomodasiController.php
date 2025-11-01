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
        $query = Akomodasi::orderBy('id', 'desc');
        $harga = $request->harga;

        $priceColumn = 'COALESCE(harga_diskon, harga_asli)';

        if ($harga == '0-500') {
            $query->whereRaw("$priceColumn <= 500000");

        } else if ($harga == '500-1000') {
            $query->whereRaw("$priceColumn BETWEEN 500000 AND 1000000");

        } else if ($harga == '1000+') {
            $query->whereRaw("$priceColumn >= 1000000");
        }

        $akomodasi = $query->get();

        return view('akomodasi', [
            'active' => 'akomodasi',
            'akomodasi' => $akomodasi,
            'harga' => $harga
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
