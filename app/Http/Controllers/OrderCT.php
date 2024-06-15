<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CarUnits;
use Illuminate\Support\Facades\Auth;

class OrderCT extends Controller
{
    public function store(Request $request, $car_unit_id)
    {
        // Validasi permintaan
        $request->validate([
            'duration' => 'required|string', // Contoh: '6jam'
        ]);

        // Mendapatkan data unit mobil
        $carUnit = CarUnits::findOrFail($car_unit_id);

        // Mengambil harga berdasarkan durasi
        $harga = 0;
        if ($request->duration === '6jam') {
            $harga = $carUnit->price_6jam;
        } elseif ($request->duration === '12jam') {
            $harga = $carUnit->price_12jam;
        } elseif ($request->duration === '24jam') {
            $harga = $carUnit->price_24jam;
        } else {
            return response()->json(['error' => 'Invalid duration'], 400);
        }

        // Membuat order baru
        $order = new Order();
        $order->user_id = Auth::id();
        $order->customer_name = Auth::user()->name;
        $order->car_unit_id = $carUnit->id;
        $order->nama_mobil = $carUnit->nama_mobil;
        $order->plat_mobil = $carUnit->plat_mobil;
        $order->harga = $harga;
        $order->status = 'proses'; // Set status order sebagai 'proses'
        $order->save();

        // Update status car unit menjadi 'proses'
        $carUnit->status = 'proses';
        $carUnit->save();

        return response()->json([
            'message' => 'Order created successfully and car unit status updated to "proses".',
            'order' => $order
        ], 201);
    }
}