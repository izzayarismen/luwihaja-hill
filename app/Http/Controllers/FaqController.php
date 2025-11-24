<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Ulasan;
use Carbon\Carbon;
use Illuminate\Http\Request; // Pastikan Request di-import

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Tambahkan 'Request $request' ke dalam parameter method index
    public function index(Request $request)
    {
        $faq = Faq::orderBy('id', 'desc')->get();
        $ulasan = Ulasan::with(['akomodasi', 'user'])
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'user' => $item->user,
                    'akomodasi' => $item->akomodasi,
                    'rating' => $item->rating,
                    'ulasan' => $item->ulasan,
                    'created_at' => Carbon::parse($item->created_at)->format('d M Y'),
                ];
            });

        // Variabel baru untuk menampung data FAQ yang akan diedit
        $faqToEdit = null;

        // Periksa apakah ada parameter 'edit' di URL (cth: ...?edit=3)
        if ($request->has('edit')) {
            $faqToEdit = Faq::findOrFail($request->edit);
        }

        return view('admin/faq-ulasan', [
            'active' => 'faq-ulasan',
            'faqs' => $faq,
            'faqToEdit' => $faqToEdit, // Kirim data 'edit' ke view
            'ulasan' => $ulasan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak digunakan dalam pendekatan ini
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data (sangat disarankan)
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        ]);

        // Tambahkan 'with' untuk flash message (opsional tapi bagus)
        return redirect('/admin/faq-ulasan')->with('success', 'FAQ berhasil ditambahkan!');
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
        // Tidak digunakan dalam pendekatan ini, karena kita edit di halaman index
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi data (sangat disarankan)
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        ]);

        return redirect('/admin/faq-ulasan')->with('success', 'FAQ berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect('/admin/faq-ulasan')->with('success', 'FAQ berhasil dihapus!');
    }
}
