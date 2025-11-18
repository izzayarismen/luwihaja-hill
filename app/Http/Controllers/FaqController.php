<?php

namespace App\Http\Controllers;

use App\Models\Faq;
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

        // Variabel baru untuk menampung data FAQ yang akan diedit
        $faqToEdit = null;

        // Periksa apakah ada parameter 'edit' di URL (cth: ...?edit=3)
        if ($request->has('edit')) {
            $faqToEdit = Faq::find($request->edit);
        }

        return view('admin/faq-ulasan', [
            'active' => 'faq-ulasan',
            'faqs' => $faq,
            'faqToEdit' => $faqToEdit // Kirim data 'edit' ke view
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

        $faq = Faq::find($id);
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
        $faq = Faq::find($id);
        $faq->delete();

        return redirect('/admin/faq-ulasan')->with('success', 'FAQ berhasil dihapus!');
    }
}
