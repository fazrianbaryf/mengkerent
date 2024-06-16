<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarUnits;
use App\Models\CustomerTransaction;
use App\Models\OrderHistory;

class TransaksiCT extends Controller
{
    public function index()
    {
        $transactions = CustomerTransaction::all(); // Mengambil semua data dari customer_transactions

        return view('transaksi-customer', [
            'transactions' => $transactions,
            'title' => 'Transaksi Customer' // Menambahkan judul 'Customer Transactions' sebagai variabel $title
        ]);
    }

     // Method untuk menyelesaikan transaksi dan memindahkan data ke order-history
     public function completeTransaction($id, Request $request)
     {
         // Ambil data transaksi berdasarkan ID
         $transaction = CustomerTransaction::findOrFail($id);
 
         // Buat entry baru di order-history
         OrderHistory::create([
             'customer_name' => $transaction->customer_name,
             'nama_mobil' => $transaction->nama_mobil,
             'plat_mobil' => $transaction->plat_mobil,
             'harga' => $transaction->harga,
             'no_telfon' => $transaction->no_telfon,
             'pelayanan' => $transaction->pelayanan,
             'alamat' => $transaction->alamat,
             'status' => 'Selesai'
         ]);
 
         // Hapus transaksi dari tabel customer_transactions
         $transaction->delete();
 
         // Ubah status car unit menjadi 'tersedia'
         $carUnit = CarUnits::find($transaction->car_unit_id);
         if ($carUnit) {
             $carUnit->status = 'tersedia';
             $carUnit->save();
         }
 
         return back()->with('success', 'Transaction completed and moved to order history successfully.');
     }
}