<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class ContentCT extends Controller
{

    public function index(Request $request)
    {
        $promos = Promo::all(); // Mengambil semua promo

        // Memeriksa jika permintaan adalah JSON (API)
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $promos,
            ]);
        }

        // Default untuk permintaan non-API
        return view('data-content', [
            'promo' => $promos,
            'title' => 'Data Content'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            // Hapus semua promo yang sudah ada
            Promo::truncate();
    
            // Buat promo baru
            Promo::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
    
            return redirect()->back()->with('success', 'Data content berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat update data content.');
        }
    }
}
