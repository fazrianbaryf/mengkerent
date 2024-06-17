<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CarUnits;
use App\Models\CustomerTransaction;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\Auth;

class OrderCT extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('data-order', [
            'orders' => $orders,
            'title' => 'Data Order'
        ]);
    }

    public function accept(Order $order)
    {
        $transaction = new CustomerTransaction();
        $transaction->user_id = $order->user_id;
        $transaction->customer_name = $order->customer_name;
        $transaction->car_unit_id = $order->car_unit_id;
        $transaction->nama_mobil = $order->nama_mobil;
        $transaction->plat_mobil = $order->plat_mobil;
        $transaction->durasi = $order->durasi; // Pastikan durasi disimpan
        $transaction->harga = $order->harga;
        $transaction->no_telfon = $order->no_telfon;
        $transaction->pelayanan = $order->pelayanan;
        $transaction->alamat = $order->alamat;
        $transaction->status = $order->status;
        $transaction->save();

        $order->delete();

        $carUnit = CarUnits::find($transaction->car_unit_id);
        if ($carUnit) {
            $carUnit->status = 'diterima';
            $carUnit->save();
        }

        return back()->with('success', 'Order customer berhasil diterima.');
    }

    public function store(Request $request, $car_unit_id)
    {
        $request->validate([
            'durasi' => 'required', // Validasi durasi
            'pelayanan' => 'required|string',
            'alamat' => 'required|string',
        ]);
    
        $carUnit = CarUnits::findOrFail($car_unit_id);
    
        $harga = 0;
        $durasi = $request->durasi;
    
        if (is_numeric($durasi)) {
            $hari = (int) $durasi;
            $harga = $carUnit->price_24jam * $hari;
            $durasi .= ' Hari';
        } elseif ($durasi === '6jam' || $durasi === '12jam' || $durasi === '24jam') {
            $harga = $carUnit->{"price_$durasi"};
            // Mengubah format durasi
            $durasi = ucfirst($durasi);
            $durasi = substr($durasi, 0, -3) . ' Jam';
        } else {
            return response()->json(['error' => 'Durasi tidak valid'], 400);
        }
    
        $order = new Order();
        $order->user_id = Auth::id();
        $order->customer_name = Auth::user()->name;
        $order->car_unit_id = $carUnit->id;
        $order->nama_mobil = $carUnit->nama_mobil;
        $order->plat_mobil = $carUnit->plat_mobil;
        $order->durasi = $durasi; // Menyimpan durasi ke database
        $order->harga = $harga;
        $order->no_telfon = Auth::user()->no_telfon;
        $order->pelayanan = $request->pelayanan;
        $order->status = 'proses';
        $order->alamat = $request->alamat;
        $order->save();
    
        $carUnit->status = 'proses';
        $carUnit->save();
    
        return response()->json([
            'message' => 'Order berhasil dibuat dan status unit mobil diubah menjadi "proses".',
            'order' => $order
        ], 201);
    }

    public function reject($id, Request $request)
{
    $order = Order::findOrFail($id);

    // Simpan pesanan ke OrderHistory dengan status ditolak
    OrderHistory::create([
        'user_id' => $order->user_id,
        'customer_name' => $order->customer_name,
        'nama_mobil' => $order->nama_mobil,
        'plat_mobil' => $order->plat_mobil,
        'durasi' => $order->durasi,
        'harga' => $order->harga,
        'no_telfon' => $order->no_telfon,
        'pelayanan' => $order->pelayanan,
        'alamat' => $order->alamat,
        'status' => 'ditolak'
    ]);

    // Hapus pesanan asli dari tabel Order
    $order->delete();

    // Ubah status CarUnit jika diperlukan
    $carUnit = CarUnits::find($order->car_unit_id);
    if ($carUnit) {
        $carUnit->status = 'tersedia';
        $carUnit->save();
    }

    return back()->with('success', 'Order rejected and moved to order history successfully.');
}

    public function cancelOrder($order_id)
    {
        $order = Order::findOrFail($order_id);

        OrderHistory::create([
            'user_id' => Auth::id(),
            'customer_name' => $order->customer_name,
            'nama_mobil' => $order->nama_mobil,
            'plat_mobil' => $order->plat_mobil,
            'durasi' => $order->durasi, // Menyimpan durasi ke order history
            'harga' => $order->harga,
            'no_telfon' => $order->no_telfon,
            'pelayanan' => $order->pelayanan,
            'alamat' => $order->alamat,
            'status' => 'dicancel'
        ]);

        $order->delete();

        $carUnit = CarUnits::find($order->car_unit_id);
        if ($carUnit) {
            $carUnit->status = 'tersedia';
            $carUnit->save();
        }

        return response()->json([
            'message' => 'Order canceled successfully and car unit status updated to "tersedia".',
            'order_id' => $order_id
        ], 200);
    }
}