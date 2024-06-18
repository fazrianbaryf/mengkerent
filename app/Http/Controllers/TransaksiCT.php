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
        $transactions = CustomerTransaction::all();

        return view('transaksi-customer', [
            'transactions' => $transactions,
            'title' => 'Transaksi Customer'
        ]);
    }

    // Method untuk menyelesaikan transaksi dan memindahkan data ke order-history
    public function completeTransaction($id, Request $request)
{
    // Ambil data transaksi berdasarkan ID
    $transaction = CustomerTransaction::findOrFail($id);

    // Validasi status transaksi yang dapat dipindahkan
    if (!in_array($transaction->status, ['selesai', 'ditolak', 'dicancel'])) {
        return back()->with('error', 'Transaksi dengan status ini tidak dapat diselesaikan.');
    }


    }

    return back()->with('success', 'Transaction completed and moved to order history successfully.');
}
}