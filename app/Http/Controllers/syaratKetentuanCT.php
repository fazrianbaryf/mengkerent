<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratKetentuan;

class SyaratKetentuanCT extends Controller
{
    public function index()
    {
        $syaratKetentuan = SyaratKetentuan::all();
        $title = "Syarat & Ketentuan";
        return view('data-syaratketentuan', compact('syaratKetentuan', 'title'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'jenis_syarat' => 'required|string',
            'syarat_ketentuan' => 'required|string',
        ]);

        SyaratKetentuan::create([
            'jenis_syarat' => $request->jenis_syarat,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ]);

        return redirect()->back()->with('success', 'Syarat & Ketentuan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_syarat' => 'required|string',
            'syarat_ketentuan' => 'required|string',
        ]);

        $syaratKetentuan = SyaratKetentuan::findOrFail($id);
        $syaratKetentuan->update([
            'jenis_syarat' => $request->jenis_syarat,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ]);

        return redirect()->back()->with('success', 'Syarat & Ketentuan berhasil diupdate');
    }

    public function delete($id)
    {
        $syaratKetentuan = SyaratKetentuan::findOrFail($id);
        $syaratKetentuan->delete();

        return redirect()->back()->with('success', 'Syarat & Ketentuan berhasil dihapus');
    }
}