<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akomodasi = Akomodasi::orderBy('id', 'desc')->get();

        return view('admin.produk', [
            'akomodasi' => $akomodasi
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
        $request->validate([
            'gambar' => 'required',
            'gambar.*' => 'image',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'harga_asli' => 'required',
            'jumlah_tamu' => 'required',
            'luas' => 'required',
            'tipe_kasur' => 'required',
            'fasilitas' => 'required',
        ]);

        $imagePaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $index => $file) {
                $filename = time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/akomodasi'), $filename);
                $imagePaths[] = '/images/akomodasi/' . $filename;
            }
        }

        $hargaAsli = str_replace('.', '', $request->harga_asli);
        $hargaDiskon = $request->harga_diskon ? str_replace('.', '', $request->harga_diskon) : null;

        Akomodasi::create([
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'harga_asli' => $hargaAsli,
            'harga_diskon' => $hargaDiskon,
            'checkin' => '14:00-21:00',
            'checkout' => '12:00',
            'jumlah_tamu' => $request->jumlah_tamu,
            'luas' => $request->luas,
            'tipe_kasur' => $request->tipe_kasur,
            'fasilitas' => $request->fasilitas,
            'smoking' => $request->has('smoking') ? 1 : 0, // Cek checkbox
            'rekomendasi' => $request->has('rekomendasi') ? 1 : 0, // Cek checkbox
            'gambar' => implode(',', $imagePaths), // Array ke string
        ]);

        return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $akomodasi = Akomodasi::findOrFail($id);

        $request->validate([
            'tipe' => 'required',
            'deskripsi' => 'required',
            'harga_asli' => 'required',
            'jumlah_tamu' => 'required',
            'luas' => 'required',
            'tipe_kasur' => 'required',
            'fasilitas' => 'required',
        ]);

        $finalImages = $request->existing_images ?? [];

        $oldImagesDb = explode(',', $akomodasi->gambar);
        foreach ($oldImagesDb as $oldImg) {
            if (!in_array($oldImg, $finalImages)) {
                $path = public_path($oldImg);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $index => $file) {
                $filename = time() . '-' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/akomodasi'), $filename);
                $finalImages[] = '/images/akomodasi/' . $filename;
            }
        }

        $gambarString = implode(',', $finalImages);

        $hargaAsli = str_replace('.', '', $request->harga_asli);
        $hargaDiskon = $request->harga_diskon ? str_replace('.', '', $request->harga_diskon) : null;

        $akomodasi->update([
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'harga_asli' => $hargaAsli,
            'harga_diskon' => $hargaDiskon,
            'jumlah_tamu' => $request->jumlah_tamu,
            'luas' => $request->luas,
            'tipe_kasur' => $request->tipe_kasur,
            'fasilitas' => $request->fasilitas,
            'smoking' => $request->has('smoking') ? 1 : 0, // Handle checkbox
            'rekomendasi' => $request->has('rekomendasi') ? 1 : 0, // Handle checkbox
            'gambar' => $gambarString,
        ]);

        return redirect('/admin/produk')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $akomodasi = Akomodasi::findOrFail($id);

        if ($akomodasi->gambar) {
            $images = explode(',', $akomodasi->gambar);
            foreach ($images as $img) {
                $path = public_path($img);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }

        $akomodasi->delete();

        return redirect('/admin/produk')->with('success', 'Produk berhasil dihapus');
    }
}
