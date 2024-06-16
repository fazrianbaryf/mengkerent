<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class ContentCT extends Controller
{
    public function index()
    {
        $promo = Promo::all(); // Retrieve all promos
        $title = "Data Content";
        return view('data-content', compact('promo', 'title'));
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