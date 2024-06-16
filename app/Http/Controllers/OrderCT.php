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
        $orders = Order::all(); // Mengambil semua data orders

        return view('data-order', [
            'orders' => $orders,
            'title' => 'Data Order' // Menambahkan judul 'Data Order' sebagai variabel $title
        ]);
    }

    public function accept(Order $order)
    {
        // Pindahkan data order ke customer_transactions
        $transaction = new CustomerTransaction();
        $transaction->user_id = $order->user_id;
        $transaction->customer_name = $order->customer_name;
        $transaction->car_unit_id = $order->car_unit_id;
        $transaction->nama_mobil = $order->nama_mobil;
        $transaction->plat_mobil = $order->plat_mobil;
        $transaction->harga = $order->harga;
        $transaction->no_telfon = $order->no_telfon;
        $transaction->pelayanan = $order->pelayanan;
        $transaction->alamat = $order->alamat;
        $transaction->status = $order->status;
        $transaction->save();

        // Hapus order dari tabel orders
        $order->delete();

        // Ubah status car unit menjadi 'diterima'
        $carUnit = CarUnits::find($transaction->car_unit_id);
        if ($carUnit) {
            $carUnit->status = 'diterima';
            $carUnit->save();
        }

        return back()->with('success', 'Order accepted and moved to customer transactions successfully.');
    }

    public function store(Request $request, $car_unit_id)
    {
        // Validasi permintaan
        $request->validate([
            'duration' => 'required', // duration harus ada
            'pelayanan' => 'required|string',
            'alamat' => 'required|string', // alamat harus ada
        ]);

        // Mendapatkan data unit mobil
        $carUnit = CarUnits::findOrFail($car_unit_id);

        // Menghitung harga berdasarkan durasi
        $harga = 0;

        if (is_numeric($request->duration)) {
            // Jika duration berupa angka, hitung harga berdasarkan harga per jam
            $jam = (int) $request->duration;
            $harga = $carUnit->price_24jam * $jam;
        } elseif ($request->duration === '6jam') {
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
        $order->no_telfon = Auth::user()->no_telfon;
        $order->pelayanan = $request->pelayanan;
        $order->harga = $harga;
        $order->status = 'proses';
        $order->alamat = $request->alamat; // Menyimpan alamat
        $order->save();
        
        // Mengubah status car unit menjadi 'proses'
        $carUnit->status = 'proses';
        $carUnit->save();

        return response()->json([
            'message' => 'Order created successfully and car unit status updated to "proses".',
            'order' => $order
        ], 201);
    }

    public function reject($id, Request $request)
    {
        // Ambil data order berdasarkan ID
        $order = Order::findOrFail($id);

        // Buat entry baru di order-history
        OrderHistory::create([
            'customer_name' => $order->customer_name,
            'nama_mobil' => $order->nama_mobil,
            'plat_mobil' => $order->plat_mobil,
            'harga' => $order->harga,
            'no_telfon' => $order->no_telfon,
            'pelayanan' => $order->pelayanan,
            'alamat' => $order->alamat,
            'status' => 'Ditolak'
        ]);

        // Hapus order dari tabel orders
        $order->delete();

        // Ubah status car unit menjadi 'tersedia'
        $carUnit = CarUnits::find($order->car_unit_id);
        if ($carUnit) {
            $carUnit->status = 'tersedia';
            $carUnit->save();
        }

        return back()->with('success', 'Order rejected and moved to order history successfully.');
    }

    public function cancelOrder($order_id)
    {
        // Temukan order berdasarkan ID
        $order = Order::findOrFail($order_id);

            // Buat entry baru di order-history
        OrderHistory::create([
            'customer_name' => $order->customer_name,
            'nama_mobil' => $order->nama_mobil,
            'plat_mobil' => $order->plat_mobil,
            'harga' => $order->harga,
            'no_telfon' => $order->no_telfon,
            'pelayanan' => $order->pelayanan,
            'alamat' => $order->alamat,
            'status' => 'Di Cancel Customer'
        ]);

        // Menghapus order
        $order->delete();

        // Mengubah status car unit menjadi 'tersedia'
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